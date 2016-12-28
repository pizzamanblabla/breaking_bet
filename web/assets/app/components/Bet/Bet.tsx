import * as React from "react";
import CoefficientComponent from "./Coefficient"
import {Coefficient} from "./Coefficient"

export interface Bet {
    readonly sport: string;
    readonly chain: string;
    readonly event: string;
    readonly team: string;
    readonly coefficients: Coefficient[]
}

export interface BetCollection {
    collection: Bet[];
}

export interface BetState {

}

export class BetComponent extends React.Component<Bet, BetState> {
    public render() {
        return <tr>
            <td>{this.props.sport}</td>
            <td>{this.props.chain}</td>
            <td>{this.props.event}</td>
            <td>{this.props.team}</td>
            {this.renderCoefficients()}
        </tr>;
    }

    private renderCoefficients() {
        return this.props.coefficients.map(
            function(coefficient: Coefficient){
                return <CoefficientComponent
                    value={coefficient.value}
                    difference={coefficient.difference}
                    type={coefficient.type}
                />
            }
        );
    }
}

export default class BetCollectionComponent extends React.Component<BetCollection, BetState> {
    public render() {
        let renderedCollection = this.props.collection.map(function(bet) {
            return <BetComponent
                sport={bet.sport}
                chain={bet.chain}
                event={bet.event}
                team={bet.team}
                coefficients={bet.coefficients}
            />;
        });

        return <tbody>{ this.renderHeadBetComponent() }{ renderedCollection }</tbody>;
    }

    private renderHeadBetComponent() {
        return <tr className="table-head">
            <td>Sport</td>
            <td>Chain</td>
            <td>Event</td>
            <td>Team</td>
            <td>Actual outcome P1</td>
            <td>Actual outcome P2</td>
            <td>Actual outcome X</td>
            <td>Double outcome 1X</td>
            <td>Double outcome X2</td>
            <td>Double outcome 12</td>
            <td>Handicap Kf_F1</td>
            <td>Handicap F1</td>
            <td>Handicap Kf_F2</td>
            <td>Handicap F2</td>
            <td>Total</td>
            <td>Total Under</td>
            <td>Total Over</td>
            <td>Actual outcome Y</td>
            <td>Actual outcome N</td>
        </tr>;
    }
}