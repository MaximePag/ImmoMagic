import React from 'react';
import RealEstate from './RealEstate';

const Carousel = () => {
    return (
        <div id="home_slider" className="row">
            <div id="carouselExampleControlsNoTouching" className="carousel slide" data-bs-touch="false" data-bs-interval="false">
                <div className="carousel-inner">
                    <div className="carousel-item active">
                        <div className="card-group">
                            <RealEstate/>
                        </div>
                    </div>
                    <div className="carousel-item mb-2">
                        <div className="card-group">
                            <RealEstate/>
                        </div>
                    </div>
                    <div className="carousel-item mb-2">
                        <div className="card-group">
                            <RealEstate/>
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
    );
};

export default Carousel;