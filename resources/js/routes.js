import Search from './components/Search';
import SearchResults from './components/SearchResults';

export default {
        mode: 'history',

        routes: [
            {
                path:'/',
                component: Search
            },
            {
                path: '/results',
                component: SearchResults
            }


        ]
}