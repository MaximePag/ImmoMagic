import Navbar from "../components/Navbar";

const Contact = () => {
    //const contact = props.contact;
    return (
            <div className={"contact"}>
            <Navbar/>
                <div class="card o-hidden border-0 shadow-lg m-5">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                           <table className={"text-center"} style={{ justifyContent:'center', alignItems:'center'}}>
                               <thead>
                                    <tr>
                                        <th> <h1 className={"text-center"} style={{color:"#e2aa19"}}><b>Vous souhaitez nous contacter?</b></h1></th>
                                    </tr>
                               </thead>
                               <br/>
                               <tbody>
                                    <tr>
                                        <td><i class="fas fa-phone-alt" style={{color:"#e2aa19"}}></i>   03.44.23.22.21</td>
                                        <td><b><i className="far fa-address-card" style={{color:"#e2aa19"}}></i>   Notre agence: </b></td>
                                    </tr>
                                    <tr>
                                        <td><i className="fas fa-mobile-alt" style={{color:"#e2aa19"}}></i>   06.05.04.03.02</td>
                                        <td> Campus Innovia</td>

                                    </tr>
                                    <tr>
                                       <td><i className="far fa-envelope" style={{color:"#e2aa19"}}></i> contact@immomagic.com</td>
                                       <td>60400 NOYON</td>
                                    </tr>
                               <tr>
                                   <td></td>
                                   <td><iframe
                                       src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d848.8865156176436!2d3.0024679979437967!3d49.600654468916645!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e873908879dbc5%3A0x212c2826ca8fe308!2sLa%20Manu%20-%20Ecole%20sup%C3%A9rieure%20des%20m%C3%A9tiers%20du%20num%C3%A9rique!5e1!3m2!1sfr!2sfr!4v1642581286348!5m2!1sfr!2sfr"
                                       width="600" height="450" allowFullScreen="" /></td>
                               </tr>
                               </tbody>
                            </table>


                        </div>
                    </div>
                </div>

        </div>
    );
};

export default Contact;