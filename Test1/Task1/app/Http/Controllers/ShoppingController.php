<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShoppingController extends Controller
{
    public function out (Request $data){
        $cost = $data->input('cost');
        $limit = 300;
        if ($cost>$limit){
            $options = '<option> Free express shiping</option>'; 
        }else{
            $options = '<option> Free shiping</option>
            <option> Express shipping - 9.99 &#X20AC </option>
            <option> Courier shipping - 19.99 &#X20AC </option>';    
        }

        $out ='<!DOCTYPE html>
                <html lang="en">
                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title>Shipping</title>
                    <style>
                    .left {
                        float: left;
                        width: 30%;
                    }

                    .inputFild {
                        width: 65%;
                    }

                    .right {
                        position: absolute;
                        right: 5%;
                    }

                    input:invalid {
                        border: 1px solid red;
                    }

                    input:valid {
                        border: 1px solid black;
                    }

                    .allert{
                        color: red
                    }

                    </style>
                </head>

                <body onload=validForm() >
                    <form name="shipping" action="'.route('raport').'" method="POST">
                        '.csrf_field().'
                        <div>
                            <div class="left">Name*</div>
                            <input class="inputFild" name="name" id="name" type="text" onchange=validForm() placeholder="Name" required>
                        </div>
                        <div>
                            <div class="left">Address*</div>
                            <input id="adress" class="inputFild" name="address" type="text" required onchange=validForm()>
                        </div>
                        <div>
                            <div class="left">Phone</div>
                            <input id="phone" class="inputFild" type="text" name="phone" placeholder="+48" pattern="\+[0-9]{10}" onchange=validForm()>
                        </div>
                        <div>
                            <div class="left">E-mail</div>
                            <input id="email" class="inputFild" name="email" type="text" onchange=validForm()>
                        </div>
                        <div id="emailError"></div>
                        <div>
                            <div class="left"> Shipping options</div>
                            <select class="inputFild" id="shippingOptions" name="option">
                                '.$options.'
                            </select>
                        </div>
                        <input type="hidden" name="cost" value="'.$cost.'">
                        <div class="right" id="buttonPay">
                            <input type="submit" value="Pay" disabled action="'.route('raport') .'">
                        </div>
                    </form>
                    <script>
                        function validForm() {
                            let fild = [{
                                "name": "name",
                                "mask": "\\.+"
                            },{
                                "name": "adress",
                                "mask": "\\.+"
                            }, {
                                "name": "phone",
                                "mask": "\\\+[0-9]{10}"
                            }, {
                                "name": "email",
                                "mask": "\\.+@.+\\\..+"
                            }]
                            let valid = true;

                            let out = `<input type="submit" value="Pay" action="'.route("raport") .'"`

                            for (let i = 0; i < fild.length; i++) {
                                const val = document.getElementById(fild[i].name).value;
                                const pattern = RegExp(fild[i].mask)
                                if (!pattern.test(val)) {
                                    valid = false;
                                }
                                let allert=""
                                if (fild[i].name="email" && !pattern.test(val) && val!=""){
                                    allert=`<div class="left"><p> </p></div><div class="allert"> Invalid e-mail </div>`
                                }
                                document.getElementById("emailError").innerHTML = allert
                            }
                            if (!valid) {
                                out += `disabled >`
                            } else {
                            out += `>`
                            }
                            document.getElementById("buttonPay").innerHTML = out
                        }
                    </script>
                </body>
            </html>';
        return $out;
        }
}
