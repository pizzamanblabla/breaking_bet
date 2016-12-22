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
    let xhr = new XMLHttpRequest();
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
    for (let i = 0, len = response.data.bets.length; i < len; i++) {
        let bet = document.createElement("tr");
        let betHtml:string = BetTemplate;
        betHtml = betHtml.replace(/:sport/i, response.data.bets[i].sport);
        betHtml = betHtml.replace(/:chain/i, response.data.bets[i].chain);
        betHtml = betHtml.replace(/:event/i, response.data.bets[i].event);

        for (let j = 0, length = response.data.bets[i].coefficients.length; j < length; j++) {
            let coef = response.data.bets[i].coefficients[j];
            let regex = new RegExp(':' + coef.type);
            betHtml = betHtml.replace(regex, coef.value + ' ( ' + coef.difference + ' )');
        }

        let types = [
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

        for (let j = 0, l = types.length; j < l; j++) {
            let regex = new RegExp(':' + types[j]);
            betHtml = betHtml.replace(regex, '-');
        }

        betHtml = betHtml.replace(/:[^<]+/, '-');
        bet.innerHTML = betHtml;
        document.getElementById('bets').appendChild(bet);
    }
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

        let bets = document.getElementById('bets');

        while (bets.childNodes.length > 2) {
            bets.removeChild(bets.lastChild);
        }

        dispatch('/api/bet/get', parameters);
    });
});