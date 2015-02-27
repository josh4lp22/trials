﻿<?php
/*		include "modal_getEmpData.php";
		$empObj = new modal_getEmployee();
		$data = $empObj->getData();
		$jsonData=json_encode($data);
		//print_R( $jsonData);

	foreach($data as $eachemp)
	{ //print_R( $eachemp);
				print "<BR>ID: " .$eachemp['empID'];
				print "<BR>Name: " .$eachemp['empFName'] . " " .$eachemp['empLName'] ;
				print "<BR>";
	}

*/

?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta name="keywords" content="jqxDragDrop, jQuery Draggable, jQWidgets, Default Functionality" />
<meta name="description" content="jqxDragDrop is a plugin which will make any DOM element draggable. It can be used in 
combination with many widgets like jqxTree, jqxGrid, jqxListBox and etc."/>
    <title id='Description'>Shopping Cart</title>
    <link rel="stylesheet" href="../../jqwidgets/styles/jqx.base.css" type="text/css" />
	<link rel="stylesheet" href="../../jqwidgets/styles/jqx.shinyblack.css" type="text/css" />
    <script type="text/javascript" src="../../scripts/jquery-1.8.2.min.js"></script>
    <script type="text/javascript" src="../../jqwidgets/jqxcore.js"></script>
    <script type="text/javascript" src="../../jqwidgets/jqxdata.js"></script> 
    <script type="text/javascript" src="../../jqwidgets/jqxbuttons.js"></script>
    <script type="text/javascript" src="../../jqwidgets/jqxscrollbar.js"></script>
    <script type="text/javascript" src="../../jqwidgets/jqxmenu.js"></script>
    <script type="text/javascript" src="../../jqwidgets/jqxgrid.js"></script>
    <script type="text/javascript" src="../../jqwidgets/jqxgrid.columnsresize.js"></script> 
    <script type="text/javascript" src="../../jqwidgets/jqxlistbox.js"></script>
    <script type="text/javascript" src="../../jqwidgets/jqxdropdownlist.js"></script>
    <script type="text/javascript" src="../../jqwidgets/jqxdragdrop.js"></script>
    <script type="text/javascript" src="../../scripts/gettheme.js"></script>

   <style type="text/css">
        .draggable-demo-cart
        {
            border: 2px dashed #aaa;
            padding: 5px;
            width: 232px;
            margin: auto;
        }
        .draggable-demo-shop 
        {
            border: 1px solid #666;
            width: 665px;
            padding: 5px;
        }
        .draggable-demo-catalog
        {
            position: relative;
            width: 397px;
            border: 1px solid #bbb;
            height: 457px;
            float: left;
        }
        .draggable-demo-product-image
        {
            width: 150px;
        }
        .draggable-demo-product
        {
            padding: 5px;
            border: 1px solid #888;
            width: 115px;
            height: 135px;
            background-color: #fff;
            position: absolute;
            margin: 5px;
        }
        .draggable-demo-product img
        {
            width: 113px;
            border: 1px solid #aaa;
            border-top-width: 0px;
            outline-width: 15px;
        }
        .draggable-demo-product-header
        {
            border: 1px solid #888;
            height: 20px;
            border-bottom-width: 0px;
            font-size: 13px;
            position: relative;
            text-align: center;
        }
        .draggable-demo-product-header-label
        {
            margin-top: 3px;
        }
        .draggable-demo-product-price
        {
            position: absolute;
            top: 124px;
            left: 6px;
            width: 113px;
            text-align: center;
            font-family: Verdana;
            font-size: 11px;
            display: none;
            height: 16px;
            border-top: 1px solid #888;
            border-bottom: 1px solid #fff;
        }
        .draggable-demo-title
        {
            font-size: 23px;
            font-family: Verdana;
            text-align: center;
            padding: 7px;
            margin: 5px;
            font-weight: bold;
            border: 1px solid #aaa;
        }
        .draggable-demo-cart-wrapper
        {
            float: right;
            border: 1px solid #aaa;
            height: 457px;
            width: 260px;
        }
        .draggable-demo-total
        {
            font-size: 17px;
            font-family: Verdana;
            margin: 6px;
            margin-top: 7px;            
            padding: 7px;
        }
    </style>
	<script>



	</script>
    <script type="text/javascript">

        $(document).ready(function () { 
			json();

           // cart.init();
        });

	var str="";

function json() {
 $.getJSON('modal_getProd.php', function(data) {
                        /* data will hold the php array as a javascript object */
						str= "{";
                        $.each(data, function(key, val) {
								str = str + "'" + val.prodName + "': { pic: '" + val.picPath + "', price:" + val.price
									+ "},";
							
                        });
						str= str + "}";
						cart.init();
                });
}

	
		
        var cart = (function ($) {  alert(str);
			
				
            var productsOffset = 3,
                products = str,
            theme, onCart = false, cartItems = [], totalPrice = 0;

            function render() {
                productsRendering();
                gridRendering();
            };

            function addClasses() {
                $('.draggable-demo-catalog').addClass('jqx-scrollbar-state-normal-' + theme);
                $('.draggable-demo-title').addClass('jqx-expander-header-' + theme);
                $('.draggable-demo-title').addClass('jqx-expander-header-expanded-' + theme);
                $('.draggable-demo-total').addClass('jqx-expander-header-' + theme).addClass('jqx-expander-header-expanded-' + theme);
                if (theme === 'shinyblack') {
                    $('.draggable-demo-shop').css('background-color', '#555');
                    $('.draggable-demo-product').css('background-color', '#999');
                }
            };

            function productsRendering() {
                var catalog = $('#catalog'),
                    imageContainer = $('</div>'),
                    image, product, left = 0, top = 0, counter = 0;
                for (var name in products) {
                    product = products[name];
                    image = createProduct(name, product);
                    image.appendTo(catalog);
                    if (counter !== 0 && counter % 3 === 0) {
                        top += 147; // image.outerHeight() + productsOffset;
                        left = 0;
                    }
                    image.css({
                        left: left,
                        top: top
                    });
                    left += 127; // image.outerWidth() + productsOffset;
                    counter += 1;
                }
                $('.draggable-demo-product').jqxDragDrop({ dropTarget: $('#cart'), revert: true });
            };

            function createProduct(name, product) {
                return $('<div class="draggable-demo-product jqx-rc-all">' +
                        '<div class="jqx-rc-t draggable-demo-product-header jqx-widget-header-' + theme + ' jqx-fill-state-normal-' + theme + '">' +
                        '<div class="draggable-demo-product-header-label"> ' + name + '</div></div>' +
                        '<div class="jqx-fill-state-normal-' + theme + ' draggable-demo-product-price">Price: <strong>$' + product.price + '</strong></div>' +
                        '<img src="../../images/t-shirts/' + product.pic + '" alt='
                        + name + '" class="jqx-rc-b" />' +
                        '</div>');
            };

            function gridRendering() {
                $("#jqxgrid").jqxGrid(
                {
                    height: 335,
                    width: 230,
                    theme: theme,
                    keyboardnavigation: false,
                    selectionmode: 'none',
                    columns: [
                      { text: 'Item', dataField: 'name', width: 120 },
                      { text: 'Count', dataField: 'count', width: 50 },
                      { text: 'Remove', dataField: 'remove', width: 60 }
                    ]
                });
                $("#jqxgrid").bind('cellclick', function (event) {
                    var index = event.args.rowindex;
                    if (event.args.datafield == 'remove') {
                        var item = cartItems[index];
                        if (item.count > 1) {
                            item.count -= 1;
                            updateGridRow(index, item);
                        }
                        else {
                            cartItems.splice(index, 1);
                            removeGridRow(index);
                        }
                        updatePrice(-item.price);
                    }
                });
            };

            function init() {
                //theme = getDemoTheme();
				theme= 'shinyblack';
                render();
                addClasses();
                addEventListeners();
            };

            function addItem(item) {
                var index = getItemIndex(item.name);
                if (index >= 0) {
                    cartItems[index].count += 1;
                    updateGridRow(index, cartItems[index]);
                } else {
                    var id = cartItems.length,
                        item = {
                            name: item.name,
                            count: 1,
                            price: item.price,
                            index: id,
                            remove: '<div style="text-align: center; cursor: pointer; width: 53px;"' +
                         'id="draggable-demo-row-' + id + '">X</div>'
                        };
                    cartItems.push(item);
                    addGridRow(item);
                }
                updatePrice(item.price);
            };


            function updatePrice(price) {
                totalPrice += price;
                $('#total').html('$ ' + totalPrice);
            };

            function addGridRow(row) {
                $("#jqxgrid").jqxGrid('addrow', null, row);
            };

            function updateGridRow(id, row) {
                var rowID = $("#jqxgrid").jqxGrid('getrowid', id);
                $("#jqxgrid").jqxGrid('updaterow', rowID, row);
            };

            function removeGridRow(id) {
                var rowID = $("#jqxgrid").jqxGrid('getrowid', id);
                $("#jqxgrid").jqxGrid('deleterow', rowID);
            };

            function getItemIndex(name) {
                for (var i = 0; i < cartItems.length; i += 1) {
                    if (cartItems[i].name === name) {
                        return i;
                    }
                }
                return -1;
            };

            function toArray(obj) {
                var item, array = [], counter = 1;
                for (var key in obj) {
                    item = {};
                    item = {
                        name: key,
                        price: obj[key].count,
                        count: obj[key].price,
                        number: counter
                    }
                    array.push(item);
                    counter += 1;
                }
                return array;
            };

            function addEventListeners() {
                $('.draggable-demo-product').mouseenter(function () {
                    $(this).children('.draggable-demo-product-price').fadeTo(100, 0.9);
                });
                $('.draggable-demo-product').mouseleave(function () {
                    $(this).children('.draggable-demo-product-price').fadeTo(100, 0);
                });
                $('.draggable-demo-product').bind('dropTargetEnter', function (event) {
                    $(event.args.target).css('border', '2px solid #000');
                    onCart = true;
                    $(this).jqxDragDrop('dropAction', 'none');
                });
                $('.draggable-demo-product').bind('dropTargetLeave', function (event) {
                    $(event.args.target).css('border', '2px solid #aaa');
                    onCart = false;
                    $(this).jqxDragDrop('dropAction', 'default');
                });
                $('.draggable-demo-product').bind('dragEnd', function (event) {
                    $('#cart').css('border', '2px dashed #aaa');
                    if (onCart) {
                        addItem({ price: event.args.price, name: event.args.name });
                        onCart = false;
                    }
                });
                $('.draggable-demo-product').bind('dragStart', function (event) {
                    var tshirt = $(this).find('.draggable-demo-product-header').text(),
                        price = $(this).find('.draggable-demo-product-price').text().replace('Price: $', '');
                    $('#cart').css('border', '2px solid #aaa');
                    price = parseInt(price, 10);
                    $(this).jqxDragDrop('data', {
                        price: price,
                        name: tshirt
                    });
                });
            };

            return {
                init: init
            }
        } ($));


    </script>
</head>
<body class='default'>
    <div id="shop" class="draggable-demo-shop jqx-rc-all">
        <div id="catalog" class="draggable-demo-catalog jqx-rc-all"></div>
        <div class="draggable-demo-cart-wrapper jqx-rc-all">
            <div class="draggable-demo-title jqx-rc-t">Shopping Cart</div>
                <div id='cart' class="draggable-demo-cart jqx-rc-all">
                    <div id="jqxgrid"></div>
                </div>
                <div class="draggable-demo-total">Total: <strong><span id="total">$ 0</span></strong></div>
            </div>
        <div style="clear: both;"></div>
    </div>
</body>
</html>
