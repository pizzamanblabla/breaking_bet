import BetComponent from "./components/Bet/Bet";
import BetTemplate from './components/Bet/BetTemplate';

interface Component {
    name: string;
    element: any;
}

interface FilterParameters {
    dateFrom: string;
    dateTo: string;
    sport?: number;
    chain?: number;
    [coefficients: number]: Coefficient
}

interface Coefficient {
    type: string,
    value: number,
}

let components: Component[] = [
    {name: '#bets', element: BetComponent},
];

function dispatch(url:string, parameters) {
    var xhr = new XMLHttpRequest();
    xhr.open("POST", url);
    xhr.onreadystatechange = function() {
        if (xhr.readyState == XMLHttpRequest.DONE) {
            resolveRemoteResponse(JSON.parse(xhr.responseText));
        }
    };
    xhr.setRequestHeader('Content-Type', 'application/json');
    xhr.send(JSON.stringify(parameters));
}

function resolveRemoteResponse(response) {
    for (var i = 0, len = response.data.bets.length; i < len; i++) {
        var bet = document.createElement("tr");
        var betHtml:string = BetTemplate;
        betHtml = betHtml.replace(/:sport/i, response.data.bets[i].sport);
        betHtml = betHtml.replace(/:chain/i, response.data.bets[i].chain);
        betHtml = betHtml.replace(/:event/i, response.data.bets[i].event);

        for (var j = 0, length = response.data.bets[i].coefficients.length; j < length; j++) {
            var coef = response.data.bets[i].coefficients[j];
            var regex = new RegExp(':' + coef.type);
            betHtml = betHtml.replace(regex, coef.value + ' ( ' + coef.difference + ' )');
        }

        var types = [
            'actual_p1',
            'actual_p2',
            'actual_x',
            'double_1x',
            'double_x2',
            'double_12',
            'handicap_kf_f1',
            'handicap_f2',
            'handicap_kf_f2',
            'handicap_f2',
            'total',
            'total_under',
            'total_over',
            'total_over',
            'total_over',
            'actual_y',
            'actual_n',
        ];

        for (var j = 0, l = types.length; j < l; j++) {
            var regex = new RegExp(':' + types[j]);
            betHtml = betHtml.replace(regex, '-');
        }

        betHtml = betHtml.replace(/:[^<]+/, '-');
        bet.innerHTML = betHtml;
        document.getElementById('bets').appendChild(bet);
    }
}

function addEventListenerList(list:NodeListOf<Element>, event:string, fn) {
    for (var i = 0, len = list.length; i < len; i++) {
        list[i].addEventListener(event, fn, false);
    }
}

window.addEventListener('DOMContentLoaded', () => {
    var controls = document.getElementsByClassName('coefficient-control');

    addEventListenerList(controls, 'change', (e) => {
        document.getElementById(e.target.id + '-value').innerHTML = e.target.value;
    });

    document.getElementById('submit-search').addEventListener('click', (e) => {
        var coefficients = [];
        var controls = document.getElementsByClassName('coefficient-control');

        for (var i = 0, len = controls.length; i < len; i++) {
            if ((<HTMLInputElement>controls[i]).value != '0') {
                coefficients.push(
                    {
                        "type": (<HTMLInputElement>controls[i]).name,
                        "value": (<HTMLInputElement>controls[i]).value
                    }
                )
            }
        }

        var parameters = {
            "sport": (<HTMLInputElement>document.getElementsByName('sport')[0]).value,
            "chain": (<HTMLInputElement>document.getElementsByName('event-chain')[0]).value,
            "dateFrom": (<HTMLInputElement>document.getElementsByName('date_from')[0]).value,
            "dateTo": (<HTMLInputElement>document.getElementsByName('date_to')[0]).value,
            "coefficients": coefficients
        };

        var bets = document.getElementById('bets');

        while (bets.childNodes.length > 2) {
            bets.removeChild(bets.lastChild);
        }

        dispatch('/api/bet/get', parameters);
    });
});