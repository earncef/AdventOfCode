package main

import (
	"strings"
)

func day9() int {
	input := strings.TrimSpace(day9inputTest)
	// input := strings.TrimSpace(day9inputReal)
	preambleLen := 5
	// preambleLen := 25

	inputArr := strings.Split(input, "\n")
	for i := preambleLen; i < len(inputArr); i++ {
		preamble := map[int]struct{}{}
		for k := i - preambleLen; k < i; k++ {
			preamble[strToInt(inputArr[k])] = struct{}{}
		}
		exists := false
		for j := i - preambleLen; j < i; j++ {
			x := strToInt(inputArr[i])
			y := strToInt(inputArr[j])
			if _, ok := preamble[x-y]; ok {
				exists = true
				break
			}
		}

		if !exists {
			return strToInt(inputArr[i])
		}
	}
	return 0
}

func day9part2() int {
	// input := strings.TrimSpace(day9inputTest)
	input := strings.TrimSpace(day9inputReal)
	// preambleLen := 5
	preambleLen := 25

	inputArr := strings.Split(input, "\n")
	for i := preambleLen; i < len(inputArr); i++ {
		preamble := map[int]struct{}{}
		preambleArr := []int{}
		for k := i - preambleLen; k < i; k++ {
			preamble[strToInt(inputArr[k])] = struct{}{}
			preambleArr = append(preambleArr, strToInt(inputArr[k]))
		}
		exists := false
		for j := i - preambleLen; j < i; j++ {
			x := strToInt(inputArr[i])
			y := strToInt(inputArr[j])
			if _, ok := preamble[x-y]; ok {
				exists = true
				break
			}
		}

		if !exists {
			required := strToInt(inputArr[i])
			for j := 0; j < len(inputArr); j++ {
				val := strToInt(inputArr[j])
				sum := val
				smallest := val
				largest := val
				for k := j + 1; k < len(inputArr); k++ {
					val := strToInt(inputArr[k])
					sum += val
					if sum > required {
						break
					}
					if val > largest {
						largest = val
					}
					if val < smallest {
						smallest = val
					}
					if sum == required {
						return smallest + largest
					}
				}
			}
			return 0
		}
	}

	return 0
}

var day9inputTest = `
35
20
15
25
47
40
62
55
65
95
102
117
150
182
127
219
299
277
309
576
`

var day9inputReal = `
37
1
33
42
17
34
27
44
26
39
3
43
30
22
9
38
7
28
21
4
50
14
35
12
5
6
71
8
15
10
11
13
16
53
17
20
18
19
23
24
9
22
25
26
21
27
28
14
67
29
30
31
33
59
32
34
35
37
40
42
54
41
39
36
23
51
61
58
43
44
102
47
46
52
53
78
55
56
65
57
101
66
114
59
80
64
62
67
69
79
87
135
133
89
90
122
108
223
113
126
115
124
116
119
151
125
121
123
128
191
129
197
348
156
234
244
179
202
198
246
224
221
228
240
231
478
235
331
242
248
285
249
251
257
308
377
463
354
335
582
381
400
419
433
445
449
456
483
477
473
559
484
490
491
536
724
611
508
565
662
831
689
716
818
864
845
819
852
878
894
905
1301
950
957
963
1197
974
1170
1417
1762
2607
1073
1224
1227
1757
1520
1405
1580
1924
1742
2367
3262
1967
3100
1799
1862
1907
1931
4109
1937
2198
2201
2243
2478
2297
3148
2997
5515
2985
3204
3319
5186
3322
3736
3706
3661
5282
3730
4340
4679
5517
5240
3868
4135
7716
6378
4444
7812
7454
6352
5982
7072
13054
6853
6940
7442
7436
6983
10808
7367
8970
7865
11427
16042
10661
14307
10117
11584
23862
12309
10426
10796
12334
12835
15910
12922
14848
13793
13836
14376
14350
26336
22713
15232
16337
16835
38670
26170
20543
20778
20913
64840
25420
29198
22735
26028
23130
41402
25757
26715
26758
27629
28169
28186
28726
29582
31569
32067
42255
33172
49845
50125
41321
41691
43648
93773
45865
48763
48492
49450
75207
89513
52515
54387
76165
54927
57751
56355
56912
58308
61151
63636
65239
87186
74493
109914
115220
95708
85339
110742
110601
109314
97255
97942
101965
106902
108870
107442
207169
205622
111282
113267
114663
150822
213247
124787
197673
139732
182594
364069
181047
183281
301330
187304
195197
402366
204844
199220
199907
208867
214344
296174
218724
224549
239450
225945
319507
254395
334103
264519
327036
365677
364328
395104
564235
448317
370585
382501
386524
590273
423568
946736
414251
408774
423211
589309
489068
443273
544056
465395
480340
518914
661139
651043
591555
778579
730005
734913
753086
757109
847896
1021628
1538291
1149164
889114
831985
1342395
1219073
852047
954463
987329
1941792
908668
945735
984309
999254
1892977
1242598
1326468
3834769
1492022
2194442
1487999
1910742
1589094
1679881
1684032
1721099
1740653
2476331
2536079
1797782
1806510
2762789
1907922
1854403
1930044
2325722
1983563
2226907
2982817
2569066
3150520
2814467
3167880
3477663
3077093
3285781
3363913
3424685
3400980
3405131
3461752
3538435
3604292
3837966
3652185
3714432
4081310
3762325
3784447
5407707
5632038
4552629
4795973
5383533
5646159
5891560
5982347
6244973
6915059
8267061
7148360
7318724
6806111
6862732
6866883
7142727
7190620
7366617
7414510
7436632
10647179
7546772
10428011
8337076
12836779
9348602
13107705
12531893
11275093
12754292
11873907
20474322
14242743
13668843
18423453
13729615
13672994
13948838
14009610
14057503
14851142
14557237
18013796
14961282
14983404
18821865
15883848
17685678
19612169
28519985
20623695
23149000
23806986
25284703
25822745
28286852
27341837
27398458
27402609
29040907
27621832
27682604
28006341
28067113
28614740
29408379
29518519
45972530
29944686
30867252
38309373
43566452
37297847
40235864
43772695
44430681
46955986
49091689
52687312
54109597
54740295
54801067
65912587
65304188
57140351
75607220
56297344
56073454
96779839
58023119
50047984
74639947
60811938
67242533
69176625
107488379
77533711
81728528
84008559
88203376
91386667
99139673
104788279
108071103
109541362
131780298
104849051
112370798
121377642
106121438
117109282
106345328
173182736
125265652
110859922
149187657
128054471
160563292
151251092
146710336
169931904
159262239
165737087
188857610
203988724
190526340
208681035
209637330
210970489
214390413
285553534
215708973
362040346
212466766
216981360
217205250
231610980
387573149
236125574
351089632
274764807
279305563
297961428
305972575
471709662
324999326
348119849
354594697
379383950
407507700
595092923
499943947
579021706
510428194
426857179
428175739
429448126
444077746
429672016
434186610
665797590
946182555
732148038
510890381
879327897
769671090
604304889
1390260301
630971901
679594023
673119175
788781307
733978647
807559689
856529195
938603933
855032918
954505940
939876320
857847755
857623865
863858626
873749762
1523645345
1400642991
1893109873
1115195270
1465396321
1461928754
1634099963
1235276790
1277424064
1304091076
1310565924
1714153060
1664088884
1522759954
1718891544
2381493100
3024718984
2161938831
1712656783
1715471620
1737608388
4259995774
1721482491
1979053896
1988945032
2350472060
3064731875
2512700854
4329525956
2927325075
4176789738
3428128403
4095646160
4375297799
2614657000
2833325878
3186848838
4231592398
3260368342
4981850833
5346026732
4822270910
4336139491
4642796695
4902320458
3459090879
3700536387
7064918276
3967998928
5773069196
5183797938
5127357854
5440025929
8409979236
6846249398
8361411337
6093694220
6073747879
5447982878
7154847766
6020174716
6447217180
6719459221
6960904729
7668535315
13034652608
7159627266
7427089807
8101887574
8642888817
8586448733
9415981806
9095356782
12619318594
13801437266
12400930658
10567383783
10888008807
14115752495
11468157594
13520784027
11521730757
12602830644
11895200058
12467391896
12739633937
21043819475
13680363950
14586717073
15095625122
15261514840
15528977381
16013538540
25828898623
26108447830
17681805515
18511338588
19983365589
21455392590
37665171104
22035541377
22089114540
22356166401
28616369184
22989888351
31878565647
23416930815
24362591954
27326351010
25207025833
26419997887
28941878790
43718364421
29682342195
39458217076
36193144103
37618091921
33695344055
54868453998
59073484511
39966731178
62875147891
41438758179
43490933967
44124655917
44391707778
45079002891
45346054752
66784568086
67541586732
71121100374
47779522769
49569617787
51627023720
54148904623
83972666872
63377686250
96706026611
67300434116
69888488158
108643102298
106366081858
155779511122
115245756291
95751679637
81405489357
93065781899
84929692146
87615589884
159370412208
134499309933
99494959375
137188922274
97349140556
149064577162
99406546489
101928427392
103718522410
105775928343
144783175607
167237628714
130678120366
152230126262
233994269308
323017139836
166335181503
178754629913
187110549259
169021079241
262989308351
172545282030
253950771387
421188400101
196844099931
205270887718
265830140878
359655831289
460206062110
244189722096
250993004554
313804254848
357669293797
396508261244
528288027554
458587430455
336258707955
341566361271
318565307765
335356260744
777152738220
338880463533
347775709154
356131628500
365865179172
369389381961
590209479342
402114987649
516823145432
441033822027
449460609814
583070185629
661579964002
562755029861
579545982840
564797259402
894153206726
674236724277
653921568509
660131669036
654824015720
657445771298
666341016919
674696936265
683131969898
890494431841
910530739015
703907337654
721996807672
1564731156118
1026835153259
851575597463
843148809676
1327920980921
1003788851888
1109592278850
1127552289263
1144343242242
1819040178507
1218718827911
1219621275122
1357828906163
1308745584229
1311367339807
1312269787018
1340577741196
1323786788217
1341037953184
1686920821786
1987492051918
1952741088526
1694724407139
2061736243817
1565145617348
1846937661564
2030624005147
1855364449351
3097084330768
2640190767939
2113381130738
2237144568113
3035762360323
2438340103033
2543408063339
2530988614929
2528366859351
2623637126825
2905723358544
2635154128024
3981228721123
4737018257563
2664824741401
3293779041710
3877561666711
3259870024487
3412083278912
3541662068703
3420510066699
3595769622495
3702302110915
3885988454498
8718246978686
5288461868226
4675484671146
4350525698851
4765511427464
4966706962384
5163520987375
8271254293641
5152003986176
7306498521197
6367126852316
5299978869425
7145858478985
8614579924274
7610395723338
6996081152625
6671953303399
6680380091186
8052827809766
7243964179618
11042611523462
10717652551167
7298071733410
7588290565413
8236514153349
14302579673822
9116037126315
13380091351738
9317232661235
11132638279780
12407485166993
10315524973551
10451982855601
11519130838492
11667105721741
17352551279664
23832074207339
13352333394585
13668034456024
13676461243811
13915917483017
19833689677482
14268670656599
20248675406095
17961616730785
25969685395563
14886362298823
15824804718762
16704327691728
20635167964807
18433269787550
19431562099866
19769215516836
19632757634786
26323402650010
23926616005485
23804316250186
30950692938358
23186236560233
32985091029371
34102360334081
40267925599593
27583951939041
32109731031361
27592378726828
28184588139616
37339495656535
30711167017585
31590689990551
32529132410490
33319632086373
34258074506312
59135281077974
43559373640271
51585860903165
37864831887416
42818994195019
39401973151622
47817345774402
50778615287061
69455521877967
46990552810419
54136929498591
75348126605509
55176330665869
55768540078657
91046540886654
55776966866444
82075420280714
58303545744413
85682177661818
70393964297906
85887497683454
64119822401041
71184463973789
`
