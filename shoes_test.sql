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
\.


--
-- Name: brand_id_seq; Type: SEQUENCE SET; Schema: public; Owner: laujmimna
--

SELECT pg_catalog.setval('brand_id_seq', 722, true);


--
-- Data for Name: store; Type: TABLE DATA; Schema: public; Owner: laujmimna
--

COPY store (id, name) FROM stdin;
\.


--
-- Name: store_id_seq; Type: SEQUENCE SET; Schema: public; Owner: laujmimna
--

SELECT pg_catalog.setval('store_id_seq', 854, true);


--
-- Data for Name: stores_brands; Type: TABLE DATA; Schema: public; Owner: laujmimna
--

COPY stores_brands (id, store_id, brand_id) FROM stdin;
1	180	149
2	180	150
3	192	159
4	192	160
5	204	169
6	204	170
7	228	189
8	228	190
9	240	199
10	240	200
11	252	209
12	253	210
13	253	211
14	265	220
15	266	221
16	266	222
17	278	231
18	279	232
19	279	233
20	291	242
21	292	243
22	292	244
23	304	253
24	305	254
25	305	255
26	317	264
27	318	265
28	318	266
29	330	275
30	331	276
31	331	277
32	343	286
33	344	287
34	344	288
35	356	297
36	357	298
37	357	299
38	369	306
39	370	307
40	370	308
41	382	317
42	383	318
43	383	319
44	395	328
45	396	329
46	396	330
47	408	339
48	409	340
49	409	341
50	421	350
51	422	351
52	422	352
53	434	361
54	435	362
55	435	363
56	447	372
57	448	373
58	448	374
59	460	383
60	461	384
61	461	385
62	473	394
63	474	395
64	474	396
65	486	402
66	487	403
67	487	404
68	499	410
69	500	411
70	500	412
71	512	420
72	513	421
73	513	422
74	525	429
75	526	430
76	526	431
77	538	438
78	539	439
79	539	440
80	550	447
81	551	448
82	551	449
83	563	456
84	564	457
85	564	458
86	576	465
87	577	466
88	577	467
89	589	474
90	590	475
91	590	476
92	602	483
93	603	484
94	603	485
95	615	492
96	616	493
97	616	494
98	628	503
99	629	504
100	629	505
101	641	514
102	642	515
103	642	516
104	654	525
105	655	526
106	655	527
107	667	536
108	668	537
109	668	538
110	680	547
111	681	548
112	681	549
113	693	560
114	694	561
115	694	562
116	706	573
117	707	574
118	707	575
119	586	708
120	587	709
121	587	710
122	598	711
123	599	712
124	599	713
125	725	600
126	726	601
127	726	602
128	613	727
129	614	728
130	614	729
131	741	615
132	742	616
133	742	617
134	628	743
135	629	744
136	629	745
137	757	630
138	758	631
139	758	632
140	643	759
141	644	760
142	644	761
143	773	645
144	774	646
145	774	647
146	658	775
147	659	776
148	659	777
149	789	660
150	790	661
151	790	662
152	791	673
153	792	674
154	793	674
155	805	675
156	806	676
157	806	677
158	807	688
159	808	689
160	809	689
161	821	690
162	822	691
163	822	692
164	823	703
165	824	704
166	825	704
167	837	705
168	838	706
169	838	707
170	839	718
171	840	719
172	841	719
173	853	720
174	854	721
175	854	722
\.


--
-- Name: stores_brands_id_seq; Type: SEQUENCE SET; Schema: public; Owner: laujmimna
--

SELECT pg_catalog.setval('stores_brands_id_seq', 175, true);


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

