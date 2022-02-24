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
    this.state = { email: "", password: "" };

    this.handleInputChange = this.handleInputChange.bind(this);
    this.handleSubmit = this.handleSubmit.bind(this);
  }
  //s'occupe de mettre à jour les champs quand on les modifie
  handleInputChange(event) {
    this.setState({ value: event.target.email });
    this.setState({ value: event.target.password });
  }
  //envoi la réponse du formulaire
  handleSubmit(event) {
    alert("mon retour :" + this.state.value);
    event.preventDefault();
  }
  render() {
    return (
      <div>
        <Navbar />
        <form onSubmit={this.handleSubmit}>
          <input
            type="text"
            placeholder="Nom"
            value={this.state.email}
            onChange={this.handleInputChange}
          />
          <input
            type="text"
            placeholder="mot de passe"
            value={this.state.password}
            onChange={this.handleInputChange}
          />
          <input type="submit" Value={"Envoyer"} />
        </form>
      </div>
    );
  }
}
export default Register;
