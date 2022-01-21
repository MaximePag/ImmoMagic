import Carousel from "../components/Carousel";
import Navbar from "../components/Navbar";
import RealEstate from "../components/RealEstate";

const Home = () => {
    return (

        <div className="home">
            <Navbar/>
            <section className="container-fluid">
                <div className="row">
                    <div className="col-lg-5 mx-auto my-5">
                        <div id="card_search" className="card mx-3">
                            <div className="card-header">
                                <h2 className="text-center mb-3"></h2>
                                <ul className="nav nav-pills nav-justified">
                                    <li className="nav-item mx-3">
                                        <a className="nav-link active" aria-current="page" href="#">Achetez</a>
                                    </li>
                                    <li className="nav-item mx-3">
                                        <a className="nav-link active" href="#">Louez</a>
                                    </li>
                                    <li className="nav-item mx-3">
                                        <a className="nav-link active" href="#">Vendez</a>
                                    </li>
                                </ul>
                            </div>
                            <div className="card-body">
                                <div className="input-group mb-3">
                                    <span className="input-group-text" id="Localisation_icon"><i className="fas fa-map-marked-alt fa-2x"></i></span>
                                    <input type="text" className="form-control" placeholder="Localisation" aria-label="Localisation" aria-describedby="Localisation_icon"/>
                                </div>
                                <div className="input-group mb-3">
                                    <span className="input-group-text" id="Budget_icon"><i className="fas fa-wallet fa-2x"></i></span>
                                    <input type="text" className="form-control" placeholder="Votre Budget" aria-label="Votre Budget" aria-describedby="Budget_icon"/>
                                    <span className="input-group-text"><i className="fas fa-euro-sign fa-1x"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <Carousel/>
            </section>
        </div>
    );
};

export default Home;