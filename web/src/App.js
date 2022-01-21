import "./assets/css/style.css";
import "./components/Navbar";
import { BrowserRouter, Switch, Route } from "react-router-dom";
import Home from "./views/Home";
import Contact from "./views/Contact";
import Register from "./views/Register";
import Http404 from "./views/Http404";

function App() {
  return (
    <BrowserRouter>
      <Switch>
        <Route path="/" exact component={Home} />
        <Route path="/contact" exact component={Contact} />
        <Route path="/register" exact component={Register} />
        <Route component={Http404} />
      </Switch>
    </BrowserRouter>
  );
}

export default App;
