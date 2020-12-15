package main

import (
	"strings"
)

func day15() int {
	// input := strings.TrimSpace(day15inputTest)
	input := strings.TrimSpace(day15inputReal)

	inputArr := strings.Split(input, ",")

	spoken := map[int]int{}
	numbers := []int{}
	prev := 0
	for i, number := range inputArr {
		num := strToInt(number)
		numbers = append(numbers, num)
		spoken[prev] = i - 1
		prev = num
	}

	for k := 0; k < 2020-len(inputArr); k++ {
		i := len(numbers) - 1
		lastNumber := numbers[i]
		pos, contains := spoken[lastNumber]
		if contains {
			lastNumber = i - pos
		} else {
			lastNumber = 0
		}

		spoken[prev] = i
		prev = lastNumber
		numbers = append(numbers, lastNumber)
	}

	return numbers[len(numbers)-1]
}

func day15part2() int {
	// input := strings.TrimSpace(day15inputTest)
	input := strings.TrimSpace(day15inputReal)

	inputArr := strings.Split(input, ",")

	spoken := map[int]int{}
	numbers := []int{}
	prev := 0
	for i, number := range inputArr {
		num := strToInt(number)
		numbers = append(numbers, num)
		spoken[prev] = i - 1
		prev = num
	}

	for k := 0; k < 30000000-len(inputArr); k++ {
		i := len(numbers) - 1
		lastNumber := numbers[i]
		pos, contains := spoken[lastNumber]
		if contains {
			lastNumber = i - pos
		} else {
			lastNumber = 0
		}

		spoken[prev] = i
		prev = lastNumber
		numbers = append(numbers, lastNumber)
	}

	return numbers[len(numbers)-1]
}

var day15inputTest = `
0,3,6
`

var day15inputReal = `
9,12,1,4,17,0,18
`
