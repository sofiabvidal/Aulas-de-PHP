/* PostgreSQL */
CREATE TABLE IF NOT EXISTS public.usuarios
(
    id      serial NOT NULL,
    nome    character varying(350) NOT NULL,    
    email   character varying(350) NOT NULL,    
    senha   character varying(150) NOT NULL,        
    PRIMARY KEY (id),
    UNIQUE (email)
)
WITH (
    OIDS = FALSE
);

/* MySQL */

CREATE TABLE usuarios
(
    id       INT             NOT NULL    AUTO_INCREMENT,
    nome     VARCHAR(350)    NOT NULL,
    email    VARCHAR(350)    NOT NULL,    
    senha    VARCHAR(150)    NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB;