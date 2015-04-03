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
-- Name: brand; Type: TABLE; Schema: public; Owner: laujmimna; Tablespace: 
--

CREATE TABLE brand (
    id integer NOT NULL,
    type character varying
);


ALTER TABLE brand OWNER TO laujmimna;

--
-- Name: brand_id_seq; Type: SEQUENCE; Schema: public; Owner: laujmimna
--

CREATE SEQUENCE brand_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE brand_id_seq OWNER TO laujmimna;

--
-- Name: brand_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: laujmimna
--

ALTER SEQUENCE brand_id_seq OWNED BY brand.id;


--
-- Name: store; Type: TABLE; Schema: public; Owner: laujmimna; Tablespace: 
--

CREATE TABLE store (
    id integer NOT NULL,
    name character varying
);


ALTER TABLE store OWNER TO laujmimna;

--
-- Name: store_id_seq; Type: SEQUENCE; Schema: public; Owner: laujmimna
--

CREATE SEQUENCE store_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE store_id_seq OWNER TO laujmimna;

--
-- Name: store_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: laujmimna
--

ALTER SEQUENCE store_id_seq OWNED BY store.id;


--
-- Name: stores_brands; Type: TABLE; Schema: public; Owner: laujmimna; Tablespace: 
--

CREATE TABLE stores_brands (
    id integer NOT NULL,
    store_id integer,
    brand_id integer
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
-- Name: id; Type: DEFAULT; Schema: public; Owner: laujmimna
--

ALTER TABLE ONLY brand ALTER COLUMN id SET DEFAULT nextval('brand_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: laujmimna
--

ALTER TABLE ONLY store ALTER COLUMN id SET DEFAULT nextval('store_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: laujmimna
--

ALTER TABLE ONLY stores_brands ALTER COLUMN id SET DEFAULT nextval('stores_brands_id_seq'::regclass);


--
-- Data for Name: brand; Type: TABLE DATA; Schema: public; Owner: laujmimna
--

COPY brand (id, type) FROM stdin;
1	
2	
3	
4	
5	
6	
7	
8	
9	
10	
11	
12	
13	
14	
15	
16	
17	
18	
19	
20	
21	
22	
23	
24	
25	
26	
27	
28	gge
29	gfdgd
30	Coach
31	
32	cdsc
33	kghkghgkj
34	
35	
\.


--
-- Name: brand_id_seq; Type: SEQUENCE SET; Schema: public; Owner: laujmimna
--

SELECT pg_catalog.setval('brand_id_seq', 35, true);


--
-- Data for Name: store; Type: TABLE DATA; Schema: public; Owner: laujmimna
--

COPY store (id, name) FROM stdin;
1	Coach
2	
3	wetwt
4	ggjgj
5	
6	
7	
8	
9	
10	fgfhdfh
11	
12	fsf
13	
14	
15	fgjhfgj
16	
17	
18	ere
19	
20	fghfghf
21	Macys
22	
23	
24	
25	
26	
27	
28	
29	
30	
31	
32	
33	
34	
35	
36	
37	
38	
39	
40	
41	
42	
43	
44	
45	
\.


--
-- Name: store_id_seq; Type: SEQUENCE SET; Schema: public; Owner: laujmimna
--

SELECT pg_catalog.setval('store_id_seq', 45, true);


--
-- Data for Name: stores_brands; Type: TABLE DATA; Schema: public; Owner: laujmimna
--

COPY stores_brands (id, store_id, brand_id) FROM stdin;
1	1	28
2	21	28
3	21	30
4	21	29
5	32	3
6	32	10
7	32	1
8	32	1
9	32	1
10	32	1
11	32	1
12	32	3
13	32	10
14	4	29
15	1	30
16	1	33
17	1	33
18	3	33
19	4	30
20	3	30
21	1	29
22	21	1
23	10	33
\.


--
-- Name: stores_brands_id_seq; Type: SEQUENCE SET; Schema: public; Owner: laujmimna
--

SELECT pg_catalog.setval('stores_brands_id_seq', 23, true);


--
-- Name: brand_pkey; Type: CONSTRAINT; Schema: public; Owner: laujmimna; Tablespace: 
--

ALTER TABLE ONLY brand
    ADD CONSTRAINT brand_pkey PRIMARY KEY (id);


--
-- Name: store_pkey; Type: CONSTRAINT; Schema: public; Owner: laujmimna; Tablespace: 
--

ALTER TABLE ONLY store
    ADD CONSTRAINT store_pkey PRIMARY KEY (id);


--
-- Name: stores_brands_pkey; Type: CONSTRAINT; Schema: public; Owner: laujmimna; Tablespace: 
--

ALTER TABLE ONLY stores_brands
    ADD CONSTRAINT stores_brands_pkey PRIMARY KEY (id);


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

