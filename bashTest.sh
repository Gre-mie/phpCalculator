#string_food1=(flower egg sugar milk butter)
#string_food_cap=(FLOWER EGG SUGAR MILK BUTTER)
#string_food2=(wheat egg honey milk butter)
#string_animals=(farmer chicken bee cow cow)

#emoji_food=(🌾 🥚 🍯 🥛 🧈)
#emoji_animals1=(👩‍🌾 🐔 🐝 🐮 🐮)
#moji_animals2=(👨‍🌾 🐔 🐝 🐮 🐮)

pass=0
fail=0

name="test: No ingredients"
input=()
run=$(php artisan print:bakery "Bob's Bakery" --test)
result=$(echo -n $run)
expect=""
if [[ ${result} == ${expect} ]]; then
    printf "%s \033[32mPass\033[0m\n" "${name}"
    ((pass++))
else
    ((fail++))
    printf "\n%s \033[31mFAIL\033[0m\n" "${name}"
    echo "input: [ ${input[@]} ]"
    printf "expected: [ %s ]\n" "$expect"
    printf "recieved: [ %s ]\n" "$result"
    printf "\n"
    printf "==========================\n"
fi
unset name input run result expect

#####################################

name="test: less than 5 ingredients "
input=(flower egg sugar milk)
run=$(php artisan print:bakery "Bob's Bakery" --test ${input[@]})
result=$run
expect="💩"
if [[ ${result} == ${expect} ]]; then
    printf "%s \033[32mPass\033[0m\n" "${name}"
    ((pass++))
else
    ((fail++))
    printf "\n%s \033[31mFAIL\033[0m\n" "${name}"
    echo "input: [ ${input[@]} ]"
    printf "expected: [ %s ]\n" "$expect"
    printf "recieved: [ %s ]\n" "$result"
    printf "\n"
    printf "==========================\n"
fi
unset name input run result expect

#####################################

name="test: numbers array"
input=(1 2 3 4 5 6 7 8)
run=$(php artisan print:bakery "Bob's Bakery" --test ${input[@]})
result=$run
expect="💩💩"

if [[ ${result} == ${expect} ]]; then
    printf "%s \033[32mPass\033[0m\n" "${name}"
    ((pass++))
else
    ((fail++))
    printf "\n%s \033[31mFAIL\033[0m\n" "${name}"
    echo "input: [ ${input[@]} ]"
    printf "expected: [ %s ]\n" "$expect"
    printf "recieved: [ %s ]\n" "$result"
    printf "\n"
    printf "==========================\n"
fi
unset name input run result expect

#####################################
name="test: Bad ingredients - name strings"
input=(Bob Steve Stew Henery Garry)
run=$(php artisan print:bakery "Bob's Bakery" --test ${input[@]})
result=$run
expect="💩"
if [[ ${result} == ${expect} ]]; then
    printf "%s \033[32mPass\033[0m\n" "${name}"
    ((pass++))
else
    ((fail++))
    printf "\n%s \033[31mFAIL\033[0m\n" "${name}"
    echo "input: [ ${input[@]} ]"
    printf "expected: [ %s ]\n" "$expect"
    printf "recieved: [ %s ]\n" "$result"
    printf "\n"
    printf "==========================\n"
fi
unset name input run result expect

#####################################

name="test: Good ingredients - in one string"
input=("🌾🥚🍯🥛🧈")
run=$(php artisan print:bakery "Bob's Bakery" --test ${input[@]})
result=$run
expect="💩"
if [[ ${result} == ${expect} ]]; then
    printf "%s \033[32mPass\033[0m\n" "${name}"
    ((pass++))
else
    ((fail++))
    printf "\n%s \033[31mFAIL\033[0m\n" "${name}"
    echo "input: [ ${input[@]} ]"
    printf "expected: [ %s ]\n" "$expect"
    printf "recieved: [ %s ]\n" "$result"
    printf "\n"
    printf "==========================\n"
fi
unset name input run result expect

#####################################

name="test: Good ingredients - complex emoji (man-wheat = farmer)"
input=(👨‍🌾 🐔 🐝 🐮 🐮)
run=$(php artisan print:bakery "Bob's Bakery" --test ${input[@]})
result=$run
expect="🍰"
if [[ ${result} == ${expect} ]]; then
    printf "%s \033[32mPass\033[0m\n" "${name}"
    ((pass++))
else
    ((fail++))
    printf "\n%s \033[31mFAIL\033[0m\n" "${name}"
    echo "input: [ ${input[@]} ]"
    printf "expected: [ %s ]\n" "$expect"
    printf "recieved: [ %s ]\n" "$result"
    printf "\n"
    printf "==========================\n"
fi
unset name input run result expect

#####################################

name="test: Good ingredients capitalised"
input=(FLOUR EGG SUGAR MILK BUTTER)
run=$(php artisan print:bakery "Bob's Bakery" --test ${input[@]})
result=$run
expect="🍰"
if [[ ${result} == ${expect} ]]; then
    printf "%s \033[32mPass\033[0m\n" "${name}"
    ((pass++))
else
    ((fail++))
    printf "\n%s \033[31mFAIL\033[0m\n" "${name}"
    echo "input: [ ${input[@]} ]"
    printf "expected: [ %s ]\n" "$expect"
    printf "recieved: [ %s ]\n" "$result"
    printf "\n"
    printf "==========================\n"
fi
unset name input run result expect

#####################################

name="test: Good ingredients - cows and dairy mix"
input=(👩‍🌾 🐔 🐝 🥛 🐮 cow butter sugar wheat egg)
run=$(php artisan print:bakery "Bob's Bakery" --test ${input[@]})
result=$run
expect="🍰🍰"
if [[ ${result} == ${expect} ]]; then
    printf "%s \033[32mPass\033[0m\n" "${name}"
    ((pass++))
else
    ((fail++))
    printf "\n%s \033[31mFAIL\033[0m\n" "${name}"
    echo "input: [ ${input[@]} ]"
    printf "expected: [ %s ]\n" "$expect"
    printf "recieved: [ %s ]\n" "$result"
    printf "\n"
    printf "==========================\n"
fi
unset name input run result expect

#####################################

name="test: Bad input emoji and text"
input=(👨‍🌾wheat 🐔chicken bee🐝 cow1 🐮2)
run=$(php artisan print:bakery "Bob's Bakery" --test ${input[@]})
result=$run
expect="💩"
if [[ ${result} == ${expect} ]]; then
    printf "%s \033[32mPass\033[0m\n" "${name}"
    ((pass++))
else
    ((fail++))
    printf "\n%s \033[31mFAIL\033[0m\n" "${name}"
    echo "input: [ ${input[@]} ]"
    printf "expected: [ %s ]\n" "$expect"
    printf "recieved: [ %s ]\n" "$result"
    printf "\n"
    printf "==========================\n"
fi
unset name input run result expect

#####################################

name="test: Bad emojies"
input=(🌾 🥚 🍯 🥛 🧈 😈 😈 😈 🐮 🐮 🐮 🐮 wheat egg honey)
run=$(php artisan print:bakery "Bob's Bakery" --test ${input[@]})
result=$run
expect="🍰💩🍰"
if [[ ${result} == ${expect} ]]; then
    printf "%s \033[32mPass\033[0m\n" "${name}"
    ((pass++))
else
    ((fail++))
    printf "\n%s \033[31mFAIL\033[0m\n" "${name}"
    echo "input: [ ${input[@]} ]"
    printf "expected: [ %s ]\n" "$expect"
    printf "recieved: [ %s ]\n" "$result"
    printf "\n"
    printf "==========================\n"
fi
unset name input run result expect

#####################################

name="test: Cow produces milk first"
input=(👩‍🌾 🐔 bee 🐮 milk)
run=$(php artisan print:bakery "Bob's Bakery" --test ${input[@]})
result=$run
expect="💩"
if [[ ${result} == ${expect} ]]; then
    printf "%s \033[32mPass\033[0m\n" "${name}"
    ((pass++))
else
    ((fail++))
    printf "\n%s \033[31mFAIL\033[0m\n" "${name}"
    echo "input: [ ${input[@]} ]"
    printf "expected: [ %s ]\n" "$expect"
    printf "recieved: [ %s ]\n" "$result"
    printf "\n"
    printf "==========================\n"
fi
unset name input run result expect

#####################################

printf "\033[32mPass: ${pass}\033[0m\n"
printf "\033[31mFail: ${fail}\033[0m\n"

echo "++++++++++++++++++++++++++++++++++++++++"

echo "visual: Large name"
input=(👨‍🌾 🐔 🐝 🐮 🐮)
expected="🍰"
echo ${input[@]}
php artisan print:bakery "bibby d bobberty famouse bakery bake bake face" ${input[@]}
printf "expected: [ %s ]\n" "$expected"
unset input expected

echo "==================================="

echo "visual: Long ingredients array"
input=(🌾 🥚 🍯 🥛 🐮 🧈 cow sugar egg flour egg butter CHEESE milk sugar 👩‍🌾 🐔 bee 🐮 butter 😈 😈 😈 😈 😈 wheatx100 sugarx100 eggx1 butterx100 milkx100 👩‍🌾 🐔 🐝 🐮 🐮 👨‍🌾 🐔 🐝 🐮 butter 🌾 🥚 🍯 🥛 🧈 farmer bee egg butter milk)
expected="🍰🍰💩🍰💩💩🍰🍰🍰🍰"
echo ${input[@]}
php artisan print:bakery "Bob's Bakery" ${input[@]}
printf "expected: [ %s ]\n" "$expected"
unset input expected
