--
-- PostgreSQL database dump
--

SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

--
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: brands; Type: TABLE; Schema: public; Owner: laujmimna; Tablespace: 
--

CREATE TABLE brands (
    id integer NOT NULL,
    type character varying
);


ALTER TABLE brands OWNER TO laujmimna;

--
-- Name: brands_id_seq; Type: SEQUENCE; Schema: public; Owner: laujmimna
--

CREATE SEQUENCE brands_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE brands_id_seq OWNER TO laujmimna;

--
-- Name: brands_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: laujmimna
--

ALTER SEQUENCE brands_id_seq OWNED BY brands.id;


--
-- Name: stores; Type: TABLE; Schema: public; Owner: laujmimna; Tablespace: 
--

CREATE TABLE stores (
    id integer NOT NULL,
    name character varying
);


ALTER TABLE stores OWNER TO laujmimna;

--
-- Name: stores_brands; Type: TABLE; Schema: public; Owner: laujmimna; Tablespace: 
--

CREATE TABLE stores_brands (
    id integer NOT NULL,
    stores_id integer,
    brands_id integer
);


ALTER TABLE stores_brands OWNER TO laujmimna;

--
-- Name: stores_brands_id_seq; Type: SEQUENCE; Schema: public; Owner: laujmimna
--

CREATE SEQUENCE stores_brands_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE stores_brands_id_seq OWNER TO laujmimna;

--
-- Name: stores_brands_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: laujmimna
--

ALTER SEQUENCE stores_brands_id_seq OWNED BY stores_brands.id;


--
-- Name: stores_id_seq; Type: SEQUENCE; Schema: public; Owner: laujmimna
--

CREATE SEQUENCE stores_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE stores_id_seq OWNER TO laujmimna;

--
-- Name: stores_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: laujmimna
--

ALTER SEQUENCE stores_id_seq OWNED BY stores.id;


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: laujmimna
--

ALTER TABLE ONLY brands ALTER COLUMN id SET DEFAULT nextval('brands_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: laujmimna
--

ALTER TABLE ONLY stores ALTER COLUMN id SET DEFAULT nextval('stores_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: laujmimna
--

ALTER TABLE ONLY stores_brands ALTER COLUMN id SET DEFAULT nextval('stores_brands_id_seq'::regclass);


--
-- Data for Name: brands; Type: TABLE DATA; Schema: public; Owner: laujmimna
--

COPY brands (id, type) FROM stdin;
342	Gucci
343	Hello
\.


--
-- Name: brands_id_seq; Type: SEQUENCE SET; Schema: public; Owner: laujmimna
--

SELECT pg_catalog.setval('brands_id_seq', 343, true);


--
-- Data for Name: stores; Type: TABLE DATA; Schema: public; Owner: laujmimna
--

COPY stores (id, name) FROM stdin;
434	Prada
\.


--
-- Data for Name: stores_brands; Type: TABLE DATA; Schema: public; Owner: laujmimna
--

COPY stores_brands (id, stores_id, brands_id) FROM stdin;
1	34	46
2	43	58
3	52	70
4	69	93
5	78	105
6	87	117
7	96	129
8	105	141
9	114	153
10	123	165
11	132	177
12	141	189
13	150	201
14	159	213
15	168	226
16	177	239
17	178	240
18	179	240
19	188	252
20	189	253
21	190	253
22	199	265
23	200	266
24	201	266
25	210	278
26	211	279
27	212	279
28	221	291
29	222	292
30	223	292
31	232	304
32	233	305
33	234	305
34	243	317
35	244	318
36	245	318
37	254	330
38	255	331
39	256	331
40	265	343
41	276	356
42	287	369
43	382	298
44	395	309
45	408	320
46	421	331
\.


--
-- Name: stores_brands_id_seq; Type: SEQUENCE SET; Schema: public; Owner: laujmimna
--

SELECT pg_catalog.setval('stores_brands_id_seq', 46, true);


--
-- Name: stores_id_seq; Type: SEQUENCE SET; Schema: public; Owner: laujmimna
--

SELECT pg_catalog.setval('stores_id_seq', 434, true);


--
-- Name: brands_pkey; Type: CONSTRAINT; Schema: public; Owner: laujmimna; Tablespace: 
--

ALTER TABLE ONLY brands
    ADD CONSTRAINT brands_pkey PRIMARY KEY (id);


--
-- Name: stores_brands_pkey; Type: CONSTRAINT; Schema: public; Owner: laujmimna; Tablespace: 
--

ALTER TABLE ONLY stores_brands
    ADD CONSTRAINT stores_brands_pkey PRIMARY KEY (id);


--
-- Name: stores_pkey; Type: CONSTRAINT; Schema: public; Owner: laujmimna; Tablespace: 
--

ALTER TABLE ONLY stores
    ADD CONSTRAINT stores_pkey PRIMARY KEY (id);


--
-- Name: public; Type: ACL; Schema: -; Owner: laujmimna
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM laujmimna;
GRANT ALL ON SCHEMA public TO laujmimna;
GRANT ALL ON SCHEMA public TO PUBLIC;


--
-- PostgreSQL database dump complete
--

