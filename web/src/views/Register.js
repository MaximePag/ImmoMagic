import Navbar from "../components/Navbar";
import React from "react";
class Register extends React.Component {
  //Le moyen le plus simple de définir un composant consiste à écrire une fonction JavaScript
  /*Exemple: class Welcome extends React.Component {
  render() {
    return <h1>Bonjour, {this.props.name}</h1>;
  }
} */
  //Cette fonction est un composant React valide car elle accepte un seul argument « props » (qui signifie « propriétés ») contenant des données, et renvoie un élément React

  constructor(props) {
    super(props);
    this.state = { email: '',
                  password: '' ,
                  adress: '',
                  firstname: '',
                  lastname: '',
                  phoneNumber: '',
                  additionnalAdress: '',
                  zipCode: '',
                  profesionnalNumber: ''};

    this.handleChange = this.handleChange.bind(this);
    this.handleSubmit = this.handleSubmit.bind(this);
  }
  //s'occupe de mettre à jour les champs quand on les modifie
  handleChange(event) {
    var value = event.target.value;
    this.setState({
      firstname: value ,
      lastname: value ,
      adress: value ,
      phoneNumber: value ,
      additionnalAdress: value ,
      zipCode: value ,
      profesionnalNumber: value ,
      password: value ,
    });
  }
//envoi la réponse du formulaire
  render() {
    return (
        <div>
          <Navbar />
          <form onSubmit={this.handleSubmit(this)} id={"registerForm"} method={"POST"}>

            <div>
              <input type={"text"} placeholder="adress" value={this.state.adress} onChange={this.handleInputChange}/>
            </div>
            <div>
              <input type={"text"} placeholder="firstname" value={this.state.firstname} onChange={this.handleInputChange}/>
            </div>
            <div>
              <input type={"text"} placeholder="lastname" value={this.state.lastname} onChange={this.handleInputChange}/>
            </div>
            <div>
              <input type={"text"} placeholder="phoneNumber" value={this.state.phoneNumber} onChange={this.handleInputChange}/>
            </div>
            <div>
              <input type={"text"} placeholder="additionnalAdress" value={this.state.additionnalAdress} onChange={this.handleInputChange}/>
            </div>
            <div>
              <input type={"text"} placeholder="zipCode" value={this.state.zipCode} onChange={this.handleInputChange}/>
            </div>
            <div>
              <input type={"text"} placeholder="profesionnalNumber" value={this.state.profesionnalNumber} onChange={this.handleInputChange}/>
            </div>
            <div>
              <input type={"text"} placeholder={"Mot de passe"} value={this.state.password} onChange={this.handleInputChange}/>
            </div>
            <input type="submit" Value="Envoyer" />
          </form>
        </div>
    );
  }
}

export default Register;