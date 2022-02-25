import "./assets/css/style.css";
import "./components/Navbar";
import { BrowserRouter, Switch, Route } from "react-router-dom";
import Home from "./views/Home";
import Contact from "./views/Contact";
import Register from "./views/Register";
import Http404 from "./views/Http404";
import Search from './views/Search';
import UserProfile from './views/UserProfile';
import RealEstateDetail from "./views/RealEstateDetail";

function App() {
  return (
    <BrowserRouter>
      <Switch>
        <Route path="/" exact component={Home} />
        <Route path="/contact" exact component={Contact} />
        <Route path="/rechercher" exact component={Search} />
        <Route path="/inscription" exact component={Register} />
        <Route path="/biens" exact component={RealEstateDetail} />
        <Route component={Http404} />
        <Route path="/userProfile/{id}" exact component={UserProfile} />
      </Switch>
    </BrowserRouter>
  );
}

export default App;
