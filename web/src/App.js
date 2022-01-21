import './assets/css/style.css';
import './components/Navbar';
import { BrowserRouter, Switch, Route } from 'react-router-dom';
import Home from './views/Home';
import Contact from './views/Contact';
import Http404 from './views/Http404';

function App() {
  return (
    <BrowserRouter>
      <Switch>
          <Route path="/" exact component={Home} />
          <Route path="/contact" exact component={Contact} />
          <Route component={Http404} />
          <Route path="/userProfile/{id}" exact component={UserProfile} />
      </Switch>
    </BrowserRouter>
  );
}

export default App;
