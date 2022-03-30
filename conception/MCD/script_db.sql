immomagic
#------------------------------------------------------------
# Table: g5e1D_roles
#------------------------------------------------------------

CREATE TABLE g5e1D_roles(
        id   Int  Auto_increment  NOT NULL ,
        name Varchar (50) NOT NULL
	,CONSTRAINT g5e1D_roles_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: g5e1D_users
#------------------------------------------------------------

CREATE TABLE g5e1D_users(
        id             Int  Auto_increment  NOT NULL ,
        firstname      Varchar (50) NOT NULL ,
        lastname       Varchar (50) NOT NULL ,
        mail           Varchar (255) NOT NULL ,
        phoneNumber    Varchar (15) NOT NULL ,
        password       Varchar (255) ,
        passwordToken  Varchar (255) ,
        address        Varchar (255) ,
        zipCode        Varchar (5) ,
        city           Varchar (255) ,
        archive        Bool NOT NULL ,
        id_g5e1D_roles Int NOT NULL
	,CONSTRAINT g5e1D_users_PK PRIMARY KEY (id)

	,CONSTRAINT g5e1D_users_g5e1D_roles_FK FOREIGN KEY (id_g5e1D_roles) REFERENCES g5e1D_roles(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: g5e1D_documents
#------------------------------------------------------------

CREATE TABLE g5e1D_documents(
        id             Int  Auto_increment  NOT NULL ,
        title          Varchar (255) NOT NULL ,
        path           Varchar (255) NOT NULL ,
        archived       Bool NOT NULL ,
        id_g5e1D_users Int NOT NULL
	,CONSTRAINT g5e1D_documents_PK PRIMARY KEY (id)

	,CONSTRAINT g5e1D_documents_g5e1D_users_FK FOREIGN KEY (id_g5e1D_users) REFERENCES g5e1D_users(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: g5e1D_typesOfContract
#------------------------------------------------------------

CREATE TABLE g5e1D_typesOfContract(
        id   Int  Auto_increment  NOT NULL ,
        name Varchar (50) NOT NULL
	,CONSTRAINT g5e1D_typesOfContract_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: g5e1D_typeOfHeating
#------------------------------------------------------------

CREATE TABLE g5e1D_typeOfHeating(
        id   Int  Auto_increment  NOT NULL ,
        name Varchar (50) NOT NULL
	,CONSTRAINT g5e1D_typeOfHeating_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: g5e1D_typeOfWaterEvacuation
#------------------------------------------------------------

CREATE TABLE g5e1D_typeOfWaterEvacuation(
        id   Int  Auto_increment  NOT NULL ,
        name Varchar (50) NOT NULL
	,CONSTRAINT g5e1D_typeOfWaterEvacuation_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: g5e1D_typeOfRealEstate
#------------------------------------------------------------

CREATE TABLE g5e1D_typeOfRealEstate(
        id   Int  Auto_increment  NOT NULL ,
        name Varchar (50) NOT NULL
	,CONSTRAINT g5e1D_typeOfRealEstate_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: g5e1D_extras
#------------------------------------------------------------

CREATE TABLE g5e1D_extras(
        id   Int  Auto_increment  NOT NULL ,
        name Varchar (50) NOT NULL
	,CONSTRAINT g5e1D_extras_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: g5e1D_appointmentsSubjects
#------------------------------------------------------------

CREATE TABLE g5e1D_appointmentsSubjects(
        id   Int  Auto_increment  NOT NULL ,
        name Varchar (50) NOT NULL
	,CONSTRAINT g5e1D_appointmentsSubjects_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: g5e1D_cities
#------------------------------------------------------------

CREATE TABLE g5e1D_cities(
        id         Int  Auto_increment  NOT NULL ,
        name       Varchar (255) NOT NULL ,
        postalCode Varchar (5) NOT NULL
	,CONSTRAINT g5e1D_cities_PK PRIMARY KEY (id)
)ENGINE=InnoDB;

immomagic
#------------------------------------------------------------
# Table: g5e1D_status
#------------------------------------------------------------

CREATE TABLE g5e1D_status(
        id   Int  Auto_increment  NOT NULL ,
        name Varchar (255) NOT NULL
	,CONSTRAINT g5e1D_status_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: g5e1D_realEstate
#------------------------------------------------------------

CREATE TABLE g5e1D_realEstate(
        id                             Int  Auto_increment  NOT NULL ,
        address                        Varchar (255) NOT NULL ,
        price                          Int NOT NULL ,
        expenses                       Float NOT NULL ,
        description                    Text NOT NULL ,
        numberOfViews                  Int NOT NULL ,
        livingArea                     Int NOT NULL ,
        landArea                       Int NOT NULL ,
        roomNumber                     Int NOT NULL ,
        bedroomNumber                  Int NOT NULL ,
        bathroomNumber                 Int NOT NULL ,
        toiletNumber                   Int NOT NULL ,
        floorNumber                    Int NOT NULL ,
        constructionYear               Varchar (50) ,
        worksToBeDone                  Bool NOT NULL ,
        GES                            Int NOT NULL ,
        DPE                            Int NOT NULL ,
        archived                       Bool NOT NULL ,
        id_g5e1D_typeOfRealEstate      Int NOT NULL ,
        id_g5e1D_typeOfWaterEvacuation Int NOT NULL ,
        id_g5e1D_typesOfContract       Int NOT NULL ,
        id_g5e1D_cities                Int NOT NULL ,
        id_g5e1D_status                Int NOT NULL
	,CONSTRAINT g5e1D_realEstate_PK PRIMARY KEY (id)

	,CONSTRAINT g5e1D_realEstate_g5e1D_typeOfRealEstate_FK FOREIGN KEY (id_g5e1D_typeOfRealEstate) REFERENCES g5e1D_typeOfRealEstate(id)
	,CONSTRAINT g5e1D_realEstate_g5e1D_typeOfWaterEvacuation0_FK FOREIGN KEY (id_g5e1D_typeOfWaterEvacuation) REFERENCES g5e1D_typeOfWaterEvacuation(id)
	,CONSTRAINT g5e1D_realEstate_g5e1D_typesOfContract1_FK FOREIGN KEY (id_g5e1D_typesOfContract) REFERENCES g5e1D_typesOfContract(id)
	,CONSTRAINT g5e1D_realEstate_g5e1D_cities2_FK FOREIGN KEY (id_g5e1D_cities) REFERENCES g5e1D_cities(id)
	,CONSTRAINT g5e1D_realEstate_g5e1D_status3_FK FOREIGN KEY (id_g5e1D_status) REFERENCES g5e1D_status(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: g5e1D_pictures
#------------------------------------------------------------

CREATE TABLE g5e1D_pictures(
        id                  Int  Auto_increment  NOT NULL ,
        path                Varchar (255) NOT NULL ,
        id_g5e1D_realEstate Int NOT NULL
	,CONSTRAINT g5e1D_pictures_PK PRIMARY KEY (id)

	,CONSTRAINT g5e1D_pictures_g5e1D_realEstate_FK FOREIGN KEY (id_g5e1D_realEstate) REFERENCES g5e1D_realEstate(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: g5e1D_favorites
#------------------------------------------------------------

CREATE TABLE g5e1D_favorites(
        id                  Int  Auto_increment  NOT NULL ,
        id_g5e1D_users      Int NOT NULL ,
        id_g5e1D_realEstate Int NOT NULL
	,CONSTRAINT g5e1D_favorites_PK PRIMARY KEY (id)

	,CONSTRAINT g5e1D_favorites_g5e1D_users_FK FOREIGN KEY (id_g5e1D_users) REFERENCES g5e1D_users(id)
	,CONSTRAINT g5e1D_favorites_g5e1D_realEstate0_FK FOREIGN KEY (id_g5e1D_realEstate) REFERENCES g5e1D_realEstate(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: g5e1D_appointments
#------------------------------------------------------------

CREATE TABLE g5e1D_appointments(
        id                                       Int  Auto_increment  NOT NULL ,
        dateHour                                 Datetime NOT NULL ,
        notes                                    Text NOT NULL ,
        comments                                 Text NOT NULL ,
        id_g5e1D_users                           Int NOT NULL ,
        id_g5e1D_realEstate                      Int NOT NULL ,
        id_g5e1D_appointmentsSubjects            Int NOT NULL ,
        id_g5e1D_users_agentsCanHaveAppointments Int NOT NULL
	,CONSTRAINT g5e1D_appointments_PK PRIMARY KEY (id)

	,CONSTRAINT g5e1D_appointments_g5e1D_users_FK FOREIGN KEY (id_g5e1D_users) REFERENCES g5e1D_users(id)
	,CONSTRAINT g5e1D_appointments_g5e1D_realEstate0_FK FOREIGN KEY (id_g5e1D_realEstate) REFERENCES g5e1D_realEstate(id)
	,CONSTRAINT g5e1D_appointments_g5e1D_appointmentsSubjects1_FK FOREIGN KEY (id_g5e1D_appointmentsSubjects) REFERENCES g5e1D_appointmentsSubjects(id)
	,CONSTRAINT g5e1D_appointments_g5e1D_users2_FK FOREIGN KEY (id_g5e1D_users_agentsCanHaveAppointments) REFERENCES g5e1D_users(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: g5e1D_realEstateCanHaveExtras
#------------------------------------------------------------

CREATE TABLE g5e1D_realEstateCanHaveExtras(
        id                  Int NOT NULL ,
        id_g5e1D_realEstate Int NOT NULL
	,CONSTRAINT g5e1D_realEstateCanHaveExtras_PK PRIMARY KEY (id,id_g5e1D_realEstate)

	,CONSTRAINT g5e1D_realEstateCanHaveExtras_g5e1D_extras_FK FOREIGN KEY (id) REFERENCES g5e1D_extras(id)
	,CONSTRAINT g5e1D_realEstateCanHaveExtras_g5e1D_realEstate0_FK FOREIGN KEY (id_g5e1D_realEstate) REFERENCES g5e1D_realEstate(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: g5e1D_realEstateCanHaveHeatType
#------------------------------------------------------------

CREATE TABLE g5e1D_realEstateCanHaveHeatType(
        id                     Int NOT NULL ,
        id_g5e1D_typeOfHeating Int NOT NULL
	,CONSTRAINT g5e1D_realEstateCanHaveHeatType_PK PRIMARY KEY (id,id_g5e1D_typeOfHeating)

	,CONSTRAINT g5e1D_realEstateCanHaveHeatType_g5e1D_realEstate_FK FOREIGN KEY (id) REFERENCES g5e1D_realEstate(id)
	,CONSTRAINT g5e1D_realEstateCanHaveHeatType_g5e1D_typeOfHeating0_FK FOREIGN KEY (id_g5e1D_typeOfHeating) REFERENCES g5e1D_typeOfHeating(id)
)ENGINE=InnoDB;

