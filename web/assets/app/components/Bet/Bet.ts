//import * as Vue from 'vue'
import Component from 'vue-class-component';
import BetTemplate from './BetTemplate';

@Component({
    template: BetTemplate,
    props: {
        bets: {type: Array, required: true},
    }
})

export default class BetComponent {
    public static ready () {
        alert('test2');
    }
}