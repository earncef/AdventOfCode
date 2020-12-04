package main

import (
	"regexp"
	"strconv"
	"strings"
)

func inArray(val string, arr []string) bool {
	for _, v := range arr {
		if v == val {
			return true
		}
	}

	return false
}

func regexReplaceAll(pattern, str, replace string) string {
	re := regexp.MustCompile(pattern)
	res := re.ReplaceAll([]byte(str), []byte(replace))
	return string(res)
}

func containsAll(s string, substr []string) bool {
	for _, sub := range substr {
		if !strings.Contains(s, sub) {
			return false
		}
	}

	return true
}

func strToInt(s string) int {
	val, _ := strconv.Atoi(s)
	return val
}
