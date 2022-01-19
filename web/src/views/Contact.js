import Navbar from "../components/Navbar";git

const Contact = () => {
    //const contact = props.contact;
    return (
        <div class="contact">
            <Navbar/>
            <h1>Vous souhaitez nous contacter?</h1>
                <div class="card o-hidden border-0 shadow-lg m-5">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                        <table>
                                <thead>
                                <tr>
                                    <th> Nous contacter :</th>
                                </tr>
                                </thead>
                                <tbody>
                                <td>
                                    <ul style="liste-style:none">
                                        <li><i class="fas fa-phone-alt"></i>   03.44.23.22.21</li>

                                    </ul>
                                </td>
                                </tbody>
                            </table>
                            {/*<div class="col">
                                <h4><i class="fas fa-phone-alt"></i>   03.44.23.22.21</h4>
                                <h4><i class="fa-regular fa-mobile"></i>   06.05.04.03.02</h4>
                                <h3><i className="fa-solid fa-envelope"></i> contact@immomagic.com</h3>
                                <p></p>
                            </div>
                            <div class="col">
                                <h3><b>Notre agence: </b></h3>
                                <p>20 rue des accacias</p>
                                <p>60400 COMPIEGNE</p>
                            </div>*/}
                        </div>
                    </div>
                </div>

        </div>
    );
};

export default Contact;