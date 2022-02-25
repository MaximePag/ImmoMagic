import Navbar from "../components/Navbar";
import React from "react";

    class Contact extends React.Component {
        constructor(props) {
            super(props);
            this.state = {
                name: '',
                firstname: '',
                phone: '',
                mail: '',
                object: '',
                query: ''
            }
        }

        render() {
            return (
                <div className={"contact"}>
                    <Navbar/>
                    <div class="card o-hidden border-2 box-shadow-lg m-5 box-shadow">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <h1 className={"text-center"} id={"yellowTitle"}><b>Nous contacter: </b></h1>
                                <table className={"text-center"}>
                                    <thead className={"text-center"}>
                                    <tr>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <br/>
                                    <tbody>
                                    <tr>
                                        <td><h4><i className={"fas fa-phone-alt"} id={"yellowTitle"}/> 03.44.23.22.21</h4>
                                        </td>
                                        <td><h4><i className={"far fa-address-card"} id={"yellowTitle"}/> Notre agence: </h4></td>
                                    </tr>
                                    <tr>
                                        <td><h4><i className="fas fa-mobile-alt" id={"yellowTitle"}/> 06.05.04.03.02 </h4>
                                        </td>
                                        <td><h6> Campus Innovia</h6></td>

                                    </tr>
                                    <tr>
                                        <td><h4><i className="far fa-envelope" id={"yellowTitle"}/> contact@immomagic.com</h4>
                                        </td>
                                        <td><h6>60400 NOYON</h6></td>
                                    </tr>
                                        <br/>
                                    <tr>
                                        <td>
                                            <h4 className={"text-center"} id={"yellowTitle"}><b>Formulaire de
                                                contact :</b></h4>
                                        </td>
                                        <td></td>

                                    </tr>
                                    <tr>
                                        <td>
                                            <form onSubmit={this.handleSubmit.bind(this)} id={"contactForm"} method={"POST"}  id={"contactForm"}>
                                                <div>
                                                    <label htmlFor={"name"}>Nom :</label>
                                                    <br/>
                                                    <input type={"text"}
                                                        value={this.state.name}
                                                        onChange={this.onNameChange.bind(this)}/>
                                                </div>
                                                <div>
                                                    <label htmlFor={"firstname"}>Prénom : </label>
                                                    <br/>
                                                    <input type={"text"}
                                                           value={this.state.firstname}
                                                           onChange={this.onFirstnameChange.bind(this)}/>
                                                </div>
                                                <div>
                                                    <label htmlFor={"email"}>Adresse mail :</label>
                                                    <br/>
                                                    <input type={"email"} className={"email"}
                                                           value={this.state.email}
                                                           onChange={this.onEmailChange.bind(this)}/>
                                                </div>
                                                <div>
                                                    <label htmlFor={"phone"}>Téléphone : </label>
                                                    <br/>
                                                    <input type={"text"} className={"phone"}
                                                           value={this.state.phone}
                                                           onChange={this.onPhoneChange.bind(this)}/>
                                                </div>
                                                <div>
                                                    <label htmlFor={"object"}>Objet : </label>
                                                    <br/>
                                                    <select value={this.state.object} onChange={this.onQueryChange.bind(this)}>
                                                        <option>Selectionnez :</option>
                                                        <option value={"rdv"}>Rendez-vous</option>
                                                        <option value={"rent"}>Location</option>
                                                        <option value={"buy"}>Acheter</option>
                                                        <option value={"sell"}>Vendre</option>
                                                        <option value={"estimate"}>Estimation</option>
                                                        <option value={"other"}>Autre</option>
                                                    </select>
                                                </div>
                                                <div>
                                                    <label htmlFor={"query"}>Votre demande :
                                                        <br/>
                                                        <textarea value={this.state.query} onChange={this.onQueryChange.bind(this)}/>
                                                    </label>
                                                </div>
                                                <button type={"submit"} id={"contactButton"}>Envoyer</button>
                                            </form>
                                        </td>
                                        <td>
                                            <iframe
                                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d848.8865156176436!2d3.0024679979437967!3d49.600654468916645!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e873908879dbc5%3A0x212c2826ca8fe308!2sLa%20Manu%20-%20Ecole%20sup%C3%A9rieure%20des%20m%C3%A9tiers%20du%20num%C3%A9rique!5e1!3m2!1sfr!2sfr!4v1642581286348!5m2!1sfr!2sfr"
                                                width="400" height="350" allowFullScreen=""/>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            );
        }

        onNameChange(event) {
            this.setState({name: event.target.value})
        }

        onFirstnameChange(event) {
            this.setState({firstname: event.target.value})
        }

        onPhoneChange(event) {
            this.setState({phone: event.target.value})
        }

        onEmailChange(event) {
            this.setState({mail: event.target.value})
        }

        onObjectChange(event) {
            this.setState({object: event.target.value})
        }

        onQueryChange(event) {
            this.setState({query: event.target.value})
        }

        handleSubmit(event) {
        }
}

export default Contact;