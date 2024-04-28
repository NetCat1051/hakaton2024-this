import telebot
import json
import requests
from telebot import types

UserTP = {}
UserTL = {}
subjects = {}
iVotes = 0
ipVote = 0
response = requests.get("https://ht.rzce.ru/api/getWays")
todos = json.loads(response.text)

response = requests.get("https://ht.rzce.ru/api/getVotes")
huyodos = json.loads(response.text)

print(todos == response.json())  # True
print(type(todos))  # <class 'list'>
trops = todos

print(todos[:10])  # ...

bot = telebot.TeleBot('6882643996:AAFkKtvXuozEm4WwW113px8AH83enXmgwx0')
@bot.message_handler(content_types=['text'])

def get_text_messages(message):
    markup = types.ReplyKeyboardMarkup(row_width=2, resize_keyboard=True)
    print(message)

    if(message.from_user.id in UserTP):
        if(UserTP[message.from_user.id] == True):
            UserTP[message.from_user.id] = False
            with open('problem.txt', 'w') as file:
                file.write(message.text)

    if (message.from_user.id in UserTL):
        if (UserTL[message.from_user.id] == True):
            UserTL[message.from_user.id] = False
            with open('predlog.txt', 'w') as file:
                file.write(message.text)

    text = ""
    if message.text == "/start":
        bot.send_message(message.from_user.id, "bot By NetCat1051/ Привет. Я - бот Владимир. Я помогу тебе разобраться с нашим сайтом."
                                               " Так же я могу помочь тебе составить новые маршруты для незабываемых путишествий. Вот список маршрутов, который я могу тебе предложить:",)
        for item in trops:
            text = text + item[0] +  ",\n"
            markup = types.ReplyKeyboardMarkup(row_width=2, resize_keyboard=True)
        btn1 = types.KeyboardButton('наш сайт')
        btn2 = types.KeyboardButton('Информация о нашем проекте')
        btn3 = types.KeyboardButton('Техническая поддержка')
        btn4 = types.KeyboardButton('Предложения и пожелания')
        btn5 = types.KeyboardButton('Регистрация на нашем сайте')
        btn6 = types.KeyboardButton('Перейти на сайт и проголосовать')
        btn7 = types.KeyboardButton('Результаты голосования')
        btn8 = types.KeyboardButton('Почта для обращений')
        markup.add(btn1, btn2, btn3, btn4, btn5, btn6, btn7, btn8)
        bot.send_message(message.from_user.id, text, reply_markup=markup)
    elif message.text == "наш сайт":
        bot.send_message(message.from_user.id, "https://ht.rzce.ru/")
    elif message.text == "Информация о нашем проекте":
        bot.send_message(message.from_user.id, "Наш проект посвящен развитию туризма в России. Мы верим, что нашастрана обладает"
                                               "большим туристическим потенциалом. Мы намеренны показать людям красоту и необъятность нашей"
                                               "родины, красоту и величие разных городов. Так же наш проет позволит людям собираться в команды"
                                               " для совместных походов, что подарит незабываемые эмоции, зарядит позитивом и подарит знакомства с новыми "
                                               "интересными людьми. Так же у нас есть отличная поддержка пользователей, которая обязательно рассмотрит ваше "
                                               "обращение и поможет вам. А еще вы може подсказать нам как улучшить нашу платформу. Будем рады каждому вашему сообщению"
                                               "Поддержка и предложения находятся в меню с кнопками")
    elif message.text == "Техническая поддержка":
        UserTP[message.from_user.id] = True
        bot.send_message(message.from_user.id, "Опишите вашу проблему")

    elif message.text == "Предложения и пожелания":
        UserTL[message.from_user.id] = True
        bot.send_message(message.from_user.id, "Что бы вы хотели нам посоветовать?")

    elif message.text == "Регистрация на нашем сайте":
        bot.send_message(message.from_user.id, "вот ссылка на регистрацию https://ht.rzce.ru/reg")

    elif message.text == "Перейти на сайт и проголосовать":
        bot.send_message(message.from_user.id, "вот ссылка на страницу голосования https://ht.rzce.ru/api/getVotes")


    elif message.text == "Почта для обращений":
        bot.send_message(message.from_user.id, "вот наша электронная почта: NetCat1015@gmail.com")

bot.polling(none_stop=True, interval=0)

