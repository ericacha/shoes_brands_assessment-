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
56	sdgdsg
\.


--
-- Name: brand_id_seq; Type: SEQUENCE SET; Schema: public; Owner: laujmimna
--

SELECT pg_catalog.setval('brand_id_seq', 56, true);


--
-- Data for Name: store; Type: TABLE DATA; Schema: public; Owner: laujmimna
--

COPY store (id, name) FROM stdin;
122	fgfdgdfhf
\.


--
-- Name: store_id_seq; Type: SEQUENCE SET; Schema: public; Owner: laujmimna
--

SELECT pg_catalog.setval('store_id_seq', 122, true);


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
24	1	1
25	59	30
26	70	40
27	70	41
28	71	40
29	81	40
30	81	41
31	82	41
32	83	40
33	83	43
34	88	45
35	90	46
36	94	48
37	93	48
38	93	47
39	96	49
40	97	49
41	100	49
42	102	49
43	103	49
44	104	49
45	105	49
46	108	49
47	110	49
48	113	49
49	114	49
50	115	49
51	116	49
52	117	49
53	118	49
54	119	49
55	119	53
56	120	56
57	121	56
58	122	56
\.


--
-- Name: stores_brands_id_seq; Type: SEQUENCE SET; Schema: public; Owner: laujmimna
--

SELECT pg_catalog.setval('stores_brands_id_seq', 58, true);


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

