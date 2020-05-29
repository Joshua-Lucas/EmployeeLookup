import Search from './components/Search';
import SearchResults from './components/SearchResults';
import NotFound from './components/NotFound';
import ResultsView from './components/ResultsView.vue';

export default {
        mode: 'history',

        routes: [
            {
                path:'*',
                component: NotFound
            },
            
            {
                path:'/',
                component: Search
            },

            {
                path: '/results',
                component: SearchResults
            },

            {
                path: '/results/*',
                component: ResultsView
            }


        ]
}