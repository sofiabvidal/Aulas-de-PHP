/* PostgreSQL */
CREATE TABLE IF NOT EXISTS public.pessoas
(
    id       serial NOT NULL,
    nome     character varying(150) NOT NULL,    
    urlfoto  character varying(350),    
    sobre    text,
    PRIMARY KEY (id)
)
WITH (
    OIDS = FALSE
);

ALTER TABLE public.series
    OWNER to postgres;



/* MySQL */

CREATE TABLE pessoas
(
    id       INT             NOT NULL    AUTO_INCREMENT,
    nome     VARCHAR(150)    NOT NULL,
    urlfoto  VARCHAR(350)    NULL,    
    sobre    TEXT            NULL,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB;