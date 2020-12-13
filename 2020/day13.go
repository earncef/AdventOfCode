package main

import (
	"math/big"
	"strings"

	"github.com/deanveloper/modmath/bigmod"
)

func day13() int {
	// input := strings.TrimSpace(day13inputTest)
	input := strings.TrimSpace(day13inputReal)

	inputArr := strings.Split(input, "\n")

	timestamp := strToInt(inputArr[0])
	cron := strings.Split(inputArr[1], ",")

	for {
		canGo := false
		busID := 0
		for i := 0; i < len(cron); i++ {
			c := strToInt(cron[i])
			if c == 0 {
				continue
			}
			if timestamp%c == 0 {
				canGo = true
				busID = c
			}
		}

		if canGo {
			return busID * (timestamp - strToInt(inputArr[0]))
		}
		timestamp++
	}

	return 0
}

func day13part2() string {
	// input := strings.TrimSpace(day13inputTest)
	input := strings.TrimSpace(day13inputReal)

	inputArr := strings.Split(input, "\n")

	cron := strings.Split(inputArr[1], ",")
	eqs := []bigmod.CrtEntry{}
	for i := 0; i < len(cron); i++ {
		c := strToInt(cron[i])
		if c == 0 {
			continue
		}

		eqs = append(eqs, bigmod.CrtEntry{
			A: big.NewInt(int64(-1 * i)),
			N: big.NewInt(int64(c)),
		})
	}

	return bigmod.SolveCrtMany(eqs).String()
}

var day13inputTest = `
939
1789,37,47,1889
`

var day13inputReal = `
1004345
41,x,x,x,x,x,x,x,x,x,x,x,x,x,x,x,x,x,x,x,x,x,x,x,x,x,x,x,x,x,x,x,x,x,x,37,x,x,x,x,x,379,x,x,x,x,x,x,x,23,x,x,x,x,13,x,x,x,17,x,x,x,x,x,x,x,x,x,x,x,29,x,557,x,x,x,x,x,x,x,x,x,x,x,x,x,x,x,x,x,x,19
`
