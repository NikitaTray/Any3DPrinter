$(document).ready(function () {
        // resetStatus();
        var websocket = new WebSocket("ws://localhost:8090");
        // var websocket = new WebSocket("wss://any3dprinter.com/wss");
        websocket.onopen = function (event) {
            // showMessage("<div class='chat-connection-ack'>Connection is established!</div>");
            sendMsg(generateAuthJSON());
        }
        websocket.onmessage = function (event) {
            var data = JSON.parse(event.data);
            // console.log(event.data);

            if (data.sender_type === "server" && data.msg_type === "command") {
                if (data.msg_content.command_name === "logout" && data.msg_content.user_name === user_mail) {
                    document.location = "/login";
                }
            }

            if (data.sender_type === "printer" && data.msg_type === "status") {
                if (data.msg_content.property) {
                    let printerID = data.sender_name.replace("@", "\\@").replace(".", "\\.");
                    $("#" + printerID + " h6").eq(0).text(data.msg_content.property.time);
                    let printerStatus = $("#" + printerID + " p");
                    printerStatus.eq(1).text(data.msg_content.property.hothead);
                    printerStatus.eq(3).text(data.msg_content.property.hotbed);
                    printerStatus.eq(5).text(data.msg_content.property.filament);
                    if (data.sender_name === $("#txtPrinter").text()) {
                        $("#txtPrinterStatus").text(data.msg_content.property.time);
                    }
                }
                if (data.sender_name === $("#txtPrinter").text()) {
                    if (data.msg_content.button) {
                        changeButtonStatus(data.msg_content.button);
                    }
                    if (data.msg_content.picture === "sent") {
                        let param = {
                            _token: $('meta[name="csrf-token"]').attr('content'),
                            email: data.sender_name
                        };
                        $.post("monitor/image", param, function (result) {
                            if (result) {
                                $("#imgPrinter").attr("src", "data:image/png;base64," + result);
                                $("#imgPrinter").css("filter","");
                            }
                        })
                    }
                }
            }
            if (data.msg_type === "auth") {
                // alert("Printer - " + data.sender_name + " is connected.");
                activePrinter(data.sender_name);
            } else if (data.msg_type === "disconnect") {
                // alert("Printer - " + data.sender_name + " is disconnected.");
                inactivePrinter(data.sender_name);
                if (data.sender_name === $("#txtPrinter").text())
                    resetStatus();
            }
        };

        function changeButtonStatus(statusInfo) {
            let btnCommand;
            switch (statusInfo.name) {
                case "btn1":
                    btnCommand = $("#btnCommand1");
                    break;
                case "btn2":
                    btnCommand = $("#btnCommand2");
                    break;
                case "btn3":
                    btnCommand = $("#btnCommand3");
                    break;
                case "btn4":
                    btnCommand = $("#btnCommand4");
                    break;
                default:
                    return;
            }
            btnCommand.text(statusInfo.text);
            btnCommand.css("color", "rgba(" + statusInfo.color + ")");
        }

        function resetStatus(active = 0) {
            $("#txtPrinter").text('');
            $("#txtPrinterStatus").text('Please select a printer.');
            $("#btnCommand1").text('Pause');
            $("#btnCommand2").text('Head On');
            $("#btnCommand3").text('Bed On');
            $("#btnCommand4").text('Kill Job');
            $("#btnCommand1").css('color','gray');
            $("#btnCommand2").css('color','gray');
            $("#btnCommand3").css('color','gray');
            $("#btnCommand4").css('color','gray');
            $("#imgPrinter").attr("src", "assets/img/printers/printer1_big.png");
            $("#imgPrinter").css("filter","grayscale(1)");
            $("#btnCommand1").attr('disabled', false);
            $("#btnCommand2").attr('disabled', false);
            $("#btnCommand3").attr('disabled', false);
            $("#btnCommand4").attr('disabled', false);
            if(active){
                $("#btnCommand1").css('color','yellow');
                $("#btnCommand2").css('color','yellow');
                $("#btnCommand3").css('color','yellow');
                $("#btnCommand4").css('color','yellow');
                $("#imgPrinter").css("filter","");
            }
        }

        websocket.onerror = function (event) {
            alert("Server error occurred.");
        };
        websocket.onclose = function (event) {
            alert("Cannot connect to the server.");
        };
        $("#btnCommand1").on("click", function () {
            if ($("#txtPrinter").text() == '') {
                alert("Please select a printer.");
                return;
            }
            sendMsg(generateCommandJSON("Command1"));
        });
        $("#btnCommand2").on("click", function () {
            if ($("#txtPrinter").text() == '') {
                alert("Please select a printer.");
                return;
            }
            sendMsg(generateCommandJSON("Command2"));
        });
        $("#btnCommand3").on("click", function () {
            if ($("#txtPrinter").text() == '') {
                alert("Please select a printer.");
                return;
            }
            sendMsg(generateCommandJSON("Command3"));
        });
        $("#btnCommand4").on("click", function () {
            if ($("#txtPrinter").text() == '') {
                alert("Please select a printer.");
                return;
            }
            sendMsg(generateCommandJSON("Command4"));
        });

        function sendMsg($msgJSON) {
            websocket.send(JSON.stringify($msgJSON));
        }

        function generateCommandJSON($command) {
            return {
                sender_type: "user",
                sender_name: user_mail,
                msg_type: "command",
                msg_content: {
                    command_name: $command,
                    printer_name: $("#txtPrinter").text()
                }
            }
        }

        function generateAuthJSON() {
            return {
                sender_type: "user",
                sender_name: user_mail,
                msg_type: "auth",
                msg_content: ""
            }
        }

        $(document).on('click', '#printerSidebar li', function () {
            id = $(this).attr('id');
            let param = {
                _token: $('meta[name="csrf-token"]').attr('content'),
                email: id
            };
            $.post("monitor/status", param, function (result) {
                if (result === "NO") {
                    alert("Printer - " + id + " is disconnected.");
                } else {
                    resetStatus(1);
                    $('#txtPrinter').text(id);
                    for (let meta of result) {
                        switch (meta["meta_name"]) {
                            case "property":
                                $("#txtPrinterStatus").text(JSON.parse(meta["meta_value"]).time);
                                break;
                            case "picture":
                                if (meta["meta_value"]) {
                                    $("#imgPrinter").attr("src", "data:image/png;base64," + meta["meta_value"]);
                                    $("#imgPrinter").css("filter","");
                                }
                                break;
                            case "permission":
                                if(meta["meta_value"] === "readonly") {
                                    $("#btnCommand1").css('color', 'gray');
                                    $("#btnCommand2").css('color', 'gray');
                                    $("#btnCommand3").css('color', 'gray');
                                    $("#btnCommand4").css('color', 'gray');
                                    $("#btnCommand1").attr('disabled', true);
                                    $("#btnCommand2").attr('disabled', true);
                                    $("#btnCommand3").attr('disabled', true);
                                    $("#btnCommand4").attr('disabled', true);
                                }
                                break;
                            default:
                                changeButtonStatus(JSON.parse(meta["meta_value"]));
                                break;
                        }
                    }
                }
            })

        });


        $("#settingPrinter").on("click", function () {
            window.location = "/setting";
        });

        function inactivePrinter($printer) {
            let printerID = $printer.replace("@", "\\@").replace(".", "\\.");
            $("#" + printerID + " img").eq(0).css("filter", "grayscale(1)");
        }

        function activePrinter($printer) {
            let printerID = $printer.replace("@", "\\@").replace(".", "\\.");
            $("#" + printerID + " img").eq(0).css("filter", "");
        }
    }
);
