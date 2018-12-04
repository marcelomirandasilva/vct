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
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
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
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 570);
/******/ })
/************************************************************************/
/******/ ({

/***/ 570:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(571);


/***/ }),

/***/ 571:
/***/ (function(module, exports) {

function limpa_formulário_cep() {
	// Limpa valores do formulário de cep.
	$("#logradouro").val("");
	$("#bairro").val("");
	$("#municipio").val("");
	$("#uf").val("");
	$("#ibge").val("");
}

$(document).ready(function () {

	//Quando o campo cep perde o foco.
	$("#cep").blur(function () {

		//Nova variável "cep" somente com dígitos.
		var cep = $(this).val().replace(/\D/g, '');

		//Verifica se campo cep possui valor informado.
		if (cep != "") {

			//Expressão regular para validar o CEP.
			var validacep = /^[0-9]{8}$/;

			//Valida o formato do CEP.
			if (validacep.test(cep)) {

				//Preenche os campos com "..." enquanto consulta webservice.
				/* $("#logradouro").val("...");
    $("#bairro").val("...");
    $("#municipio").val("...");
    $("#uf").val("..."); */

				//Consulta o webservice viacep.com.br/
				$.getJSON("//viacep.com.br/ws/" + cep + "/json/?callback=?", function (dados) {

					if (!("erro" in dados)) {
						//Atualiza os campos com os valores da consulta.
						$("#logradouro").val(dados.logradouro.toLocaleUpperCase());
						$("#bairro").val(dados.bairro.toLocaleUpperCase());
						$("#municipio").val(dados.localidade.toLocaleUpperCase());
						$("#uf").val(dados.uf.toLocaleUpperCase());
					} //end if.
					else {
							//CEP pesquisado não foi encontrado.
							//limpa_formulário_cep()
							//alert("CEP não encontrado.");
							funcoes.notificationRight("top", "right", "warning", "CEP não encontrado!");
						}
				});
			} //end if.
			else {
					//cep é inválido.
					//limpa_formulário_cep()
					funcoes.notificationRight("top", "right", "warning", "CEP inválido!");
				}
		} //end if.
		else {
				//cep sem valor, limpa formulário.
				//limpa_formulário_cep()
			}
	});
});

/***/ })

/******/ });