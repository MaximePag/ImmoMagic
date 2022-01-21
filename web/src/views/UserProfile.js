import Navbar from '../components/Navbar';
import React, {useEffect, useState} from 'react';
import {useHistory} from "react-router";
import axios from 'axios';


//class UserProfile extends React.Component {
//useState pour pouvoir faire quelque chose quand l'etat de lavariable va changer
const UserProfile = () => {

    const [UserProfile, setUserProfile] = useState([]);

    useEffect(() => {
        axios.get('http://localhost:8000/profile/').then((apiDatas) => setUserProfile(apiDatas.data));
}, []);

   /*const [user, setUser] = useState({});
   const [sessionUrl, ] = useState('/api/profile');
   const history = useHistory();

   useEffect(() => {
       (async () => {
           try {
               const response = await axios.get(sessionUrl);
               setUser(response.data);
           }catch (err){
               history.push({
                   pathname: '/login'
               });
           }
       })();
   }, []);*/

    return(
        <div className={"userProfile"}>
            <Navbar/>
            <div className="card o-hidden border-0 shadow-lg m-5">
                <div className="card-body">
                    <div className="row no-gutters align-items-center">
                        <h1 className={"text-center"} style={{color: "#e2aa19"}}><b>Vos informations : </b></h1>
                            <hr/>
                        <div className={"mb3 row"}>
                            {/* <div>Nom: {user["firstname"]}</div>
                            <div>Prénom : {user["lastname"]}</div>
                            <div> Adresse : {user["address"]}</div>
                            <div>{user["additionalAdress"]}</div>
                            <div>Code Postal: {user.zipCode}</div>
                            <div>Commune : {user.city}</div>
                            <div>Téléphone: {user.phoneNumber}</div>
                            <div>Adresse mail: {user.mail}</div> */}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    );
}

export default UserProfile;