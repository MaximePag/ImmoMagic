import "./assets/css/style.css";
import "./components/Navbar";
import { BrowserRouter, Switch, Route } from "react-router-dom";
import React , { useState, useEffect } from 'react';
import axios from 'axios';

import Home from "./views/Home";
import Contact from "./views/Contact";
import Register from "./views/Register";
import Http404 from "./views/Http404";
import Search from './views/Search';
import UserProfile from './views/UserProfile';
<<<<<<< HEAD
import RealEstateDetail from "./views/RealEstateDetail";
=======
import Login from './views/Login';
import PrivateRoute from './Utils/PrivateRoute';
import PublicRoute from './Utils/PublicRoute';
import { getToken, removeUserSession, setUserSession } from './Utils/Common';

>>>>>>> bd23da65717680d2e9200a8c2c82c1ea27e38628

function App() {
  const [authLoading, setAuthLoading] = useState(true);

  useEffect(() => {
    const token = getToken();
    if (!token) {
      return;
    }

    axios.get(`http://localhost:8000/api/login?token=${token}`).then(response => {
      setUserSession(response.data.token, response.data.user);
      setAuthLoading(false);
    }).catch(error => {


      removeUserSession();
      setAuthLoading(false);
    });
  }, []);

  if (authLoading && getToken()) {
    return <div className="content">Checking Authentication...</div>
  }

  return (
    <BrowserRouter>
      <Switch>
        <Route path="/" exact component={Home} />
        <Route path="/contact" exact component={Contact} />
        <Route path="/rechercher" exact component={Search} />
        <Route path="/inscription" exact component={Register} />
<<<<<<< HEAD
        <Route path="/biens" exact component={RealEstateDetail} />
=======
        <PublicRoute path="/login" exact component={Login} />
>>>>>>> bd23da65717680d2e9200a8c2c82c1ea27e38628
        <Route component={Http404} />
        <PrivateRoute path="/userProfile" exact component={UserProfile} />
      </Switch>
    </BrowserRouter>
  );
}

export default App;
