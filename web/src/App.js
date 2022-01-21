import './assets/css/style.css';
import './components/Navbar';
import { BrowserRouter, Switch, Route } from 'react-router-dom';
import Home from './views/Home';
import Contact from './views/Contact';
import Http404 from './views/Http404';
import Search from './views/Search';

function App() {
  return (
    <BrowserRouter>
      <Switch>
        <Route path="/" exact component={Home} />
        <Route path="/contact" exact component={Contact} />
        <Route path="/rechercher" exact component={Search} />
        <Route component={Http404} />
      </Switch>
    </BrowserRouter>
  );
}

export default App;
