package main

import (
	"sort"
	"strings"
)

func day10() int {
	// input := strings.TrimSpace(day10inputTest)
	input := strings.TrimSpace(day10inputReal)

	inputArr := strings.Split(input, "\n")
	jolts := []int{}
	for _, line := range inputArr {
		jolts = append(jolts, strToInt(line))
	}

	sort.Ints(jolts)

	start := 0
	one := 0
	two := 0
	three := 1
	for _, jolt := range jolts {
		if start+1 == jolt {
			one++
			start += 1
		} else if start+2 == jolt {
			two++
			start += 2
		} else if start+3 == jolt {
			three++
			start += 3
		}
	}

	return one * three
}

func day10part2() int {
	// input := strings.TrimSpace(day10inputTest)
	input := strings.TrimSpace(day10inputReal)

	inputArr := strings.Split(input, "\n")
	jolts := []int{0}
	for _, line := range inputArr {
		jolts = append(jolts, strToInt(line))
	}
	sort.Ints(jolts)
	jolts = append(jolts, jolts[len(jolts)-1]+3)

	totals := map[int]int{0: 1}
	for i := 1; i < len(jolts); i++ {
		jolt := jolts[i]
		totals[jolt] = totals[jolt-1] + totals[jolt-2] + totals[jolt-3]
	}

	return totals[jolts[len(jolts)-1]]
}

var day10inputTest = `
28
33
18
42
31
14
46
20
48
47
24
23
49
45
19
38
39
11
1
32
25
35
8
17
7
9
4
2
34
10
3`

var day10inputReal = `
105
78
37
153
10
175
62
163
87
22
24
92
46
5
115
61
124
128
8
60
17
93
166
29
90
148
113
55
141
134
79
101
49
133
38
53
33
30
66
159
23
132
145
147
121
94
146
21
135
56
176
118
44
138
85
169
111
9
1
83
36
59
140
149
160
43
131
69
2
25
84
39
28
171
172
100
18
15
114
70
86
97
155
152
40
122
77
16
11
170
52
45
139
76
102
63
54
142
14
158
80
154
112
91
108
73
127
123
`
