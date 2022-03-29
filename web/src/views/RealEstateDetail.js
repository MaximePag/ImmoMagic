import React, {useState, useEffect} from 'react';
import axios from 'axios';
import Navbar from '../components/Navbar';

const RealEstateDetail = (props) => {
  const realEstateId = props.location.state
  const [realEstateDatas, setRealEstate] = useState([]);
  const [fetch, setFetch] = useState(true);

  useEffect(() => {
      if (fetch){
          axios.get('http://localhost:8005/RealEstate/' + realEstateId).then((apiDatas) => {
              setRealEstate(apiDatas.data)
              setFetch(false)
          });
      };
  }, [realEstateDatas, fetch]);
  return (
    <div className="realestate">
      <Navbar/>
        <div className="row g-0 o-hidden border-2 box-shadow-lg m-5 box-shadow p-3">
            <div className="col-lg-5">
              <div id="home_slider" className="row">
                <div id="carouselExampleControlsNoTouching" className="carousel slide" data-bs-touch="false" data-bs-interval="false">
                    <div className="carousel-inner">
                        <div className="carousel-item active mb-2">
                            <div className="card-group">
                                <div className="row row-cols-1 row-cols-md-3 g-2">
                                  <img src="./img/maison-1.jpg" className="card-img-top" alt="image maison"/>
                                </div>
                            </div>
                        </div>
                        <div className="carousel-item mb-2">
                            <div className="card-group">
                                <div className="row row-cols-1 row-cols-md-3 g-2">
                                  <img src="./img/maison-2.jpg" className="card-img-top" alt="image maison"/>
                                </div>
                            </div>
                        </div>
                        <div className="carousel-item mb-2">
                            <div className="card-group">
                                <div className="row row-cols-1 row-cols-md-3 g-2">
                                  <img src="./img/maison-3.jpg" className="card-img-top" alt="image maison"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button className="carousel-control-prev" type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="prev">
                        <span className="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span className="visually-hidden">Previous</span>
                    </button>
                    <button className="carousel-control-next" type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="next">
                        <span className="carousel-control-next-icon" aria-hidden="true"></span>
                        <span className="visually-hidden">Next</span>
                    </button>
                </div>
              </div>
            </div>
            <div className="col-lg-7">
              <h1>{realEstateDatas.id_g5e1D_typesOfContract === 1 ? 'À Louer' : 'À Vendre'}</h1>
              <div className="col mt-2">
                    <div className="realEstate card mx-3">
                      <div className="card-header">
                        <p>{realEstateDatas.description}</p>
                      </div>
                      <div className="card-body row">
                        <div className="col-lg-6">
                          <p className="card-text"><i className="fas fa-map-marked-alt"></i> Localisation : {realEstateDatas.address}</p>
                          <p className="card-text"><i className="fas fa-expand"></i> Nombre de pièces : {realEstateDatas.roomNumber} pièces <a className="badge badge-magic text-wrap" data-bs-toggle="collapse" href="#room-details" role="button" aria-expanded="false" aria-controls="#room-details">Détails</a></p>
                          <div className="collapse multi-collapse card mb-3" id="room-details">
                            <p className="card-text"><i className="fas fa-bed"></i> {realEstateDatas.bedroomNumber} x chambres</p>
                            <p className="card-text"><i className="fas fa-bath"></i> {realEstateDatas.bathroomNumber} x salle de bain</p>
                            <p className="card-text"><i className="fas fa-toilet"></i> {realEstateDatas.toiletNumber} x toilette</p>
                          </div>
                          <p className="card-text"><i className="fas fa-calendar-day"></i> Date de construction : ~ An {realEstateDatas.constructionYear}</p>
                          <p className="card-text"><i className="fas fa-fire-alt"></i> Type de chauffage : Gaz</p>
                          <p className="card-text"><i className="fas fa-fill-drip"></i> Evacuation des eaux : Communes</p>
                        </div>
                        <div className="col-lg-6">
                          <p className="card-text"><i className="fas fa-expand-alt"></i> Superficie totale : {realEstateDatas.livingArea} m²</p>
                          <p className="card-text"><i className="fas fa-tree"></i> Superficie terrain : {realEstateDatas.landArea} m²</p>
                          <p className="card-text"><i className="fas fa-building"></i> Nombre d'étages : {realEstateDatas.floorNumber}</p>
                          <p className="card-text"><i className="fas fa-signal"></i> DPE : {realEstateDatas.DPE} / GES : {realEstateDatas.GES}</p>
                          <p className="card-text"><i className="fas fa-paint-roller"></i> Travaux à prévoir : {realEstateDatas.worksToBeDone === 0 ? 'Non' : 'Oui'}</p>
                        </div>
                        <p className="card-text"><i className="fas fa-plus"></i> Les plus : Piscine, Garage</p>
                      </div>
                      <div className="card-footer">
                          <h2 className="card-text"><i className="fas fa-coins"></i> {realEstateDatas.id_g5e1D_typesOfContract === 1 ? 'Loyer' : 'Prix'} : {realEstateDatas.price} €</h2>
                          {realEstateDatas.id_g5e1D_typesOfContract === 1 
                          ? <p className="card-text text-muted">{realEstateDatas.price} € de loyer dont {realEstateDatas.expenses} € de charges locatives</p>
                          : ''
                          }
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  );
};

export default RealEstateDetail;

//   useEffect(() => {
//     axios
//       .get("http://localhost:8005/RealEstate/")
//       .then((apiDatas) => setRealEstate(apiDatas.data));
//   }, []);

//   return (
//     <>
//       {realEstateDatas.map((realEstate) => (
//         <div>
//           <img
//             src="assets/images/maison-2.jpg"
//             className="card-img-top"
//             alt="image maison"
//           />
//           <div>
//             <th>
//               <tr>
//                 <td>{realEstate.livingArea}</td>
//                 <td>{realEstate.landArea}</td>
//                 <td>{realEstate.livingRoomArea}</td>
//                 <td>{realEstate.roomNumber}</td>
//               </tr>
//               <tr>
//                 <td>{realEstate.bedroomNumber}</td>
//                 <td>{realEstate.bathroomNumber}</td>
//                 <td>{realEstate.toiletNumber}</td>
//                 <td>{realEstate.floorNumber}</td>
//               </tr>
//               <tr>
//                 <td>{realEstate.garage}</td>
//                 <td>{realEstate.parking}</td>
//                 <td>{realEstate.constructionYear}</td>
//                 <td>{realEstate.worksToBeDone}</td>
//               </tr>
//             </th>
//           </div>
//           <div>{realEstate.description}</div>
//         </div>
//       ))}
//     </>
//   );
// };
// import React, { useEffect, useState } from 'react'
// import Axios from 'axios'
// import { Row, Col } from 'antd';
// import ProductImage from './Sections/ProductImage';
// import ProductInfo from './Sections/ProductInfo';
// import { addToCart } from '../../../_actions/user_actions';
// import { useDispatch } from 'react-redux';
// function DetailProductPage(props) {
//     const dispatch = useDispatch();
//     const productId = props.match.params.productId
//     const [Product, setProduct] = useState([])

//     useEffect(() => {
//         Axios.get(`/api/product/products_by_id?id=${productId}&type=single`)
//             .then(response => {
//                 setProduct(response.data[0])
//             })

//     }, [])

//     const addToCartHandler = (productId) => {
//         dispatch(addToCart(productId))
//     }

//     return (
//         <div className="postPage" style={{ width: '100%', padding: '3rem 4rem' }}>

//             <div style={{ display: 'flex', justifyContent: 'center' }}>
//                 <h1>{Product.title}</h1>
//             </div>

//             <br />

//             <Row gutter={[16, 16]} >
//                 <Col lg={12} xs={24}>
//                     <ProductImage detail={Product} />
//                 </Col>
//                 <Col lg={12} xs={24}>
//                     <ProductInfo
//                         addToCart={addToCartHandler}
//                         detail={Product} />
//                 </Col>
//             </Row>
//         </div>
//     )
// }

// export default DetailProductPage

