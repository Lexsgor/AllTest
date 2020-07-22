<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <style>
        .border {
            border: 2px solid black;
            display: grid;
            grid-template-columns: 1fr 3fr 1fr;
        }

        .buttonBlock {
            display: grid;
            grid-template-rows: 1fr 2fr 1fr;
            text-align: right;
        }

        .margin {
            margin: 10px;
        }

        .right {
            float: right;
        }
    </style>
</head>

<body onload=onLoad()>
    <div id="out"></div>
    
    <script>
        let itemNumber = []
        function onLoad() {
            document.getElementById("out").innerHTML = `<h1> Load </h1>`;
            var request = new XMLHttpRequest();
            request.open("GET", "https://5f02087b9e41230016d42ae5.mockapi.io/test/Shop/");
            request.setRequestHeader('Content-type', 'application/json; charset=utf-8');
            request.send(request);
            request.onload = function () {
                productData = JSON.parse(request.response)
                for (let i = 0; i < productData.length; i++) {
                    clearNumber(i)
                }
                redraw()
            };
        }

        function redraw() {
            let out = '';
            let cost = 0;
            for (let i = 0; i < productData.length; i++) {
                out = out +
                    `<div class="border">
                        <img src="" width="200" height="200">
                        <div>
                            <h2>`+ productData[i]["name"] + `</h2>
                            <p>` + productData[i]["text"] + `</p>
                        </div>
                        <div class="buttonBlock">
                            <div class="margin">
                                <input class="dellButton" type="button" value="&#128465" onclick=clearNumber(`+ i + `)>
                            </div>
                            <div></div>
                            <div class="margin">
                                <input type="button" value="-" onclick=removNumber(`+ i + `)>
                                <input type="text" value="`+ itemNumber[i] + `" size="1" disabled>
                                <input type="button" value="+" onclick=addNumber(`+ i + `)>
                                `+ productData[i]["cost"] + ` &#X20AC
                            </div>
                        </div>    
                    </div>`;
                cost += itemNumber[i] * productData[i]["cost"]
            }

            out += `<div class="right">
                        <div>
                            <h2>` + cost + ` &#X20AC </h2>  
                        </div>
                        <div class="right">`+
                            '@csrf'+
                            `<form action="{{route('shopping')}}" >
                                <input type="hidden" name="cost" value="`+ cost +`">
                                <input type="submit" value="BUY">
                            </form>
                        </div> 
                    </div>`;
            document.getElementById("out").innerHTML = out;
        }

        function addNumber(indexs) {
            if (itemNumber[indexs] < 50) {
                itemNumber[indexs]++;
            }
            redraw();
        }

        function removNumber(indexs) {
            if (itemNumber[indexs] == 0) {
                itemNumber[indexs] = 0;
            }
            else {
                itemNumber[indexs]--;
            }
            redraw();
        }

        function clearNumber(indexs) {
            itemNumber[indexs] = 0;
            redraw();
        }
    </script>
</body>

