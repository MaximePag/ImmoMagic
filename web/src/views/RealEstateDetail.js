import React, { useState, useEffect } from "react";
import axios from "axios";

const RealEstate = () => {
  const [realEstateDatas, setRealEstate] = useState([]);

  useEffect(() => {
    axios
      .get("http://localhost:8005/RealEstate/")
      .then((apiDatas) => setRealEstate(apiDatas.data));
  }, []);

  return (
    <>
      {realEstateDatas.map((realEstate) => (
        <div>
          <img
            src="assets/images/maison-2.jpg"
            className="card-img-top"
            alt="image maison"
          />
          <div>
            <th>
              <tr>
                <td>{realEstate.livingArea}</td>
                <td>{realEstate.landArea}</td>
                <td>{realEstate.livingRoomArea}</td>
                <td>{realEstate.roomNumber}</td>
              </tr>
              <tr>
                <td>{realEstate.bedroomNumber}</td>
                <td>{realEstate.bathroomNumber}</td>
                <td>{realEstate.toiletNumber}</td>
                <td>{realEstate.floorNumber}</td>
              </tr>
              <tr>
                <td>{realEstate.garage}</td>
                <td>{realEstate.parking}</td>
                <td>{realEstate.constructionYear}</td>
                <td>{realEstate.worksToBeDone}</td>
              </tr>
            </th>
          </div>
          <div>{realEstate.description}</div>
        </div>
      ))}
    </>
  );
};
import React, { useEffect, useState } from 'react'
import Axios from 'axios'
import { Row, Col } from 'antd';
import ProductImage from './Sections/ProductImage';
import ProductInfo from './Sections/ProductInfo';
import { addToCart } from '../../../_actions/user_actions';
import { useDispatch } from 'react-redux';
function DetailProductPage(props) {
    const dispatch = useDispatch();
    const productId = props.match.params.productId
    const [Product, setProduct] = useState([])

    useEffect(() => {
        Axios.get(`/api/product/products_by_id?id=${productId}&type=single`)
            .then(response => {
                setProduct(response.data[0])
            })

    }, [])

    const addToCartHandler = (productId) => {
        dispatch(addToCart(productId))
    }

    return (
        <div className="postPage" style={{ width: '100%', padding: '3rem 4rem' }}>

            <div style={{ display: 'flex', justifyContent: 'center' }}>
                <h1>{Product.title}</h1>
            </div>

            <br />

            <Row gutter={[16, 16]} >
                <Col lg={12} xs={24}>
                    <ProductImage detail={Product} />
                </Col>
                <Col lg={12} xs={24}>
                    <ProductInfo
                        addToCart={addToCartHandler}
                        detail={Product} />
                </Col>
            </Row>
        </div>
    )
}

export default DetailProductPage

export default RealEstate;
