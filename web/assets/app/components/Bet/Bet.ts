//import * as Vue from 'vue'
import Component from 'vue-class-component';
import BetTemplate from './BetTemplate';

@Component({
    template: BetTemplate
})

export default class BetFiltersComponent {
    public static ready () {
        alert('test2');
    }
}