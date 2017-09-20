"use strict";
var __extends = (this && this.__extends) || function (d, b) {
    for (var p in b) if (b.hasOwnProperty(p)) d[p] = b[p];
    function __() { this.constructor = d; }
    d.prototype = b === null ? Object.create(b) : (__.prototype = b.prototype, new __());
};
var React = require("react");
var Coefficient_1 = require("./Coefficient");
readonly;
sport: string;
readonly;
chain: string;
readonly;
event: string;
readonly;
team: string;
readonly;
coefficients: Coefficient[];
var BetComponent = (function (_super) {
    __extends(BetComponent, _super);
    function BetComponent() {
        _super.apply(this, arguments);
    }
    BetComponent.prototype.render = function () {
        return <tr>
            <td>{this.props.sport}</td>
            <td>{this.props.chain}</td>
            <td>{this.props.event}</td>
            <td>{this.props.team}</td>
            {this.renderCoefficients()}
        </tr>;
    };
    BetComponent.prototype.renderCoefficients = function () {
        return this.props.coefficients.map(function (coefficient) {
            return <Coefficient_1["default"] value={coefficient.value} difference={coefficient.difference} type={coefficient.type}/>;
        });
    };
    return BetComponent;
}(React.Component));
exports.BetComponent = BetComponent;
var BetCollectionComponent = (function (_super) {
    __extends(BetCollectionComponent, _super);
    function BetCollectionComponent() {
        _super.apply(this, arguments);
    }
    BetCollectionComponent.prototype.render = function () {
        var renderedCollection = this.props.collection.map(function (bet) {
            return <BetComponent sport={bet.sport} chain={bet.chain} event={bet.event} team={bet.team} coefficients={bet.coefficients}/>;
        });
        return <tbody>{this.renderHeadBetComponent()}{renderedCollection}</tbody>;
    };
    BetCollectionComponent.prototype.renderHeadBetComponent = function () {
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
    };
    return BetCollectionComponent;
}(React.Component));
exports.__esModule = true;
exports["default"] = BetCollectionComponent;
//# sourceMappingURL=Bet.js.map