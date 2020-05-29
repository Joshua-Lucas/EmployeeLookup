import Search from './components/Search';
import SearchResults from './components/SearchResults';
import NotFound from './components/NotFound';

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
            }


        ]
}