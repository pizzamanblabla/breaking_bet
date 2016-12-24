import * as React from "react";
import * as ReactDOM from "react-dom";
import BetCollection from "./components/Bet/Bet";
import LoadingComponent from "./components/Popup/Loading";

function dispatch(url:string, parameters) {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", url);
    xhr.onreadystatechange = function() {
        if (xhr.readyState == XMLHttpRequest.DONE) {
            resolveRemoteResponse(JSON.parse(xhr.responseText));
        }
    };
    xhr.setRequestHeader('Content-Type', 'application/json');
    xhr.send(JSON.stringify(parameters));

    ReactDOM.render(
        <LoadingComponent content="public/images/loading_icon.gif" message="Loading..." display={true} />,
        document.getElementById('popup')
    );
}

function resolveRemoteResponse(response) {
    ReactDOM.render(
        <LoadingComponent content="public/images/loading_icon.gif" message="Loading..." display={false} />,
        document.getElementById('popup')
    );

    ReactDOM.render(
        <BetCollection collection={response.data.bets}/>,
        document.getElementById('bets')
    );
}

function addEventListenerList(list:NodeListOf<Element>, event:string, fn) {
    for (let i = 0, len = list.length; i < len; i++) {
        list[i].addEventListener(event, fn, false);
    }
}

window.addEventListener('DOMContentLoaded', () => {
    let controls = document.getElementsByClassName('coefficient-control');

    addEventListenerList(controls, 'change', (e) => {
        document.getElementById(e.target.id + '-value').innerHTML = e.target.value;
    });

    document.getElementById('submit-search').addEventListener('click', (e) => {
        let coefficients = [];
        let controls = document.getElementsByClassName('coefficient-control');

        for (let i = 0, len = controls.length; i < len; i++) {
            if ((controls[i] as HTMLInputElement).value != '0') {
                coefficients.push(
                    {
                        "type": (controls[i] as HTMLInputElement).name,
                        "value": (controls[i] as HTMLInputElement).value
                    }
                )
            }
        }

        let parameters = {
            "sport": (document.getElementsByName('sport')[0] as HTMLInputElement).value,
            "chain": (document.getElementsByName('event-chain')[0] as HTMLInputElement).value,
            "dateFrom": (document.getElementsByName('date_from')[0] as HTMLInputElement).value,
            "dateTo": (document.getElementsByName('date_to')[0] as HTMLInputElement).value,
            "coefficients": coefficients
        };

        dispatch('/api/bet/get', parameters);
    });
});