/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 1);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/assets/js/frontend-custom.js":
/*!************************************************!*\
  !*** ./resources/assets/js/frontend-custom.js ***!
  \************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

$(document).ready(function () {
  console.log('frontend-custom.js is ready');
  $('#ModalquickView').on('show.bs.modal', function (e) {
    console.log('showing the modal'); //get data-id attribute of the clicked element

    var id = $(e.relatedTarget).data('id');
    var sku = $(e.relatedTarget).data('sku');
    var name = $(e.relatedTarget).data('name');
    var image = $(e.relatedTarget).data('image');
    var description = $(e.relatedTarget).data('description');
    var notes = $(e.relatedTarget).data('notes');
    var price = $(e.relatedTarget).data('price');
    var currency = $(e.relatedTarget).data('currency-name');
    var url = $(e.relatedTarget).data('url');
    var qty = $(e.relatedTarget).data('qty');
    var colors = $(e.relatedTarget).data('colors');
    var sizes = $(e.relatedTarget).data('sizes'); //populate the textbox

    $(e.currentTarget).find('#element-id').text(id);
    $(e.currentTarget).find('#element-sku').text(sku);
    $(e.currentTarget).find('#element-image').attr('src', image);
    $(e.currentTarget).find('#element-name').text(name);
    $(e.currentTarget).find('#element-description').text(description);
    $(e.currentTarget).find('#element-notes').text(notes);
    $(e.currentTarget).find('#element-price').text(price);
    $(e.currentTarget).find('#element-currency-name').text(currency);
    $(e.currentTarget).find('#element-qty').text(qty);
    $(e.currentTarget).find('#element-url').attr('href', url);
    $(e.currentTarget).find('#element-colors').text(colors);
    $(e.currentTarget).find('#element-sizes').text(sizes);
  }); // Product Page --> add Product to Cart
  // OnChanging Size DropDown

  $('[id^="size-"]').on('change', function (e) {
    productId = $(this).attr('data-element-id');
    $("a[id^=color-id-]").addClass('d-none');
    $("a[id^=\"color-id-").attr('qty', '');
    $("li[class^=color-id-element]").removeClass('active'); // reset the max-qty

    $("#max-qty-".concat(productId)).attr('size', 1);
    $("#max-qty-".concat(productId)).attr('value', 1);
    $("#add_to_cart_".concat(productId)).attr('disabled', 'disabled');
    size_id = e.target.value;
    product_id = $("#product_id_".concat(productId)).attr('value');
    $("input[name=size_id_".concat(productId, "]")).attr('value', size_id); // reset the qty input

    $("input[name=qty_".concat(productId, "]")).attr('value', 1);
    return axios.get('/api/qty', {
      params: {
        size_id: size_id,
        product_id: product_id
      }
    }).then(function (r) {
      if (r.data.length >= 1) {
        $("#color-".concat(productId)).removeClass('d-none');

        _.each(r.data, function (e, i) {
          console.log('the', e);
          color_element = $("#color-id-".concat(productId, "-").concat(e.color_id));
          color_element.removeClass('d-none');
          color_element.attr('data-qty', e.qty);
          color_element.attr('data-product-attribute-id', e.id);
        });
      }
    })["catch"](function (e) {
      return console.log(e);
    });
  });
  $('a[id^="color-id-"]').on('click', function (e) {
    color_id = $(this).data('color-id');
    qty = $(this).data('qty');
    product_attribute_id = $(this).data('product-attribute-id');
    $("#max-qty-".concat(productId)).attr('size', qty);
    $("input[id=color_id_".concat(productId, "]")).attr('value', color_id);
    $("input[id=size_id_".concat(productId, "]")).attr('value', size_id);
    $("input[id=product_attribute_id_".concat(productId, "]")).attr('value', product_attribute_id);
    $("#add_to_cart_".concat(productId)).attr('disabled', false);
  });
  $("[id^=plus-btn]").on('click', function () {
    productId = $(this).data('product-id');
    console.log('the product id', productId);
    var qty = $("input[id=qty_".concat(productId, "]"));
    currentQty = Number(qty.attr('value'));
    maxSize = Number($("#max-qty-".concat(productId)).attr('size'));
    newQty = Number(_.sum([currentQty, 1]));

    if (newQty <= maxSize) {
      qty.attr('value', newQty);
      $("#max-qty-".concat(productId)).attr('value', newQty);
    }
  });
  $("[id^=minus-btn]").on('click', function () {
    productId = $(this).data('product-id');
    var qty = $("input[id=qty_".concat(productId, "]"));
    currentQty = parseInt(qty.attr('value'));
    maxSize = Number($("#max-qty-".concat(productId)).attr('size'));
    newQty = _.sum([currentQty, -1]);

    if (newQty <= maxSize && newQty > 0) {
      qty.attr('value', newQty);
      $("#max-qty-".concat(productId)).attr('value', newQty);
    }
  });
});

/***/ }),

/***/ 1:
/*!******************************************************!*\
  !*** multi ./resources/assets/js/frontend-custom.js ***!
  \******************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /Users/mac/Sites/mallr/resources/assets/js/frontend-custom.js */"./resources/assets/js/frontend-custom.js");


/***/ })

/******/ });