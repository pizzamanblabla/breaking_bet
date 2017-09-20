"use strict";
var React = require("react");
var ReactDOM = require("react-dom");
var Bet_1 = require("./components/Bet/Bet");
var Loading_1 = require("./components/Popup/Loading");
function dispatch(url, parameters) {
    var xhr = new XMLHttpRequest();
    xhr.open("POST", url);
    xhr.onreadystatechange = function () {
        if (xhr.readyState == XMLHttpRequest.DONE) {
            resolveRemoteResponse(JSON.parse(xhr.responseText));
        }
    };
    xhr.setRequestHeader('Content-Type', 'application/json');
    xhr.send(JSON.stringify(parameters));
    ReactDOM.render(<Loading_1["default"] content="public/images/loading_icon.gif" message="Loading..." display={true}/>, document.getElementById('popup'));
}
function resolveRemoteResponse(response) {
    ReactDOM.render(<Loading_1["default"] content="public/images/loading_icon.gif" message="Loading..." display={false}/>, document.getElementById('popup'));
    ReactDOM.render(<Bet_1["default"] collection={response.data.bets}/>, document.getElementById('bets'));
}
function addEventListenerList(list, event, fn) {
    for (var i = 0, len = list.length; i < len; i++) {
        list[i].addEventListener(event, fn, false);
    }
}
window.addEventListener('DOMContentLoaded', function () {
    var controls = document.getElementsByClassName('coefficient-control');
    addEventListenerList(controls, 'change', function (e) {
        document.getElementById(e.target.id + '-value').innerHTML = e.target.value;
    });
    document.getElementById('submit-search').addEventListener('click', function (e) {
        var coefficients = [];
        var controls = document.getElementsByClassName('coefficient-control');
        for (var i = 0, len = controls.length; i < len; i++) {
            if (controls[i].value != '0') {
                coefficients.push({
                    "type": controls[i].name,
                    "value": controls[i].value
                });
            }
        }
        var parameters = {
            "sport": document.getElementsByName('sport')[0].value,
            "chain": document.getElementsByName('event-chain')[0].value,
            "dateFrom": document.getElementsByName('date_from')[0].value,
            "dateTo": document.getElementsByName('date_to')[0].value,
            "coefficients": coefficients
        };
        dispatch('/api/bet/get', parameters);
    });
});
//# sourceMappingURL=main.js.map