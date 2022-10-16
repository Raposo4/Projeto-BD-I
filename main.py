import tkinter as tk
from tkinter import *

#####     INTERFACE GRAFICA(GUI)     #####
frame = tk.Tk()
frame.title('OWLspedagem PET-SI') #frame title
frame.resizable(False, False)
frame.geometry('1024x720')
frame.config(background="#8B0000")


#####     COMPONENTES(WIDGETS)     #####
img_logo = PhotoImage(file="imgs/logo.png")
img_logo = img_logo.subsample(6, 6)
img1 = Label(image=img_logo, bg="#8B0000", height=120)

label_welcome = tk.Label(frame, text="Bem-Vindo ao OWLspedagem PET-SI", fg="white", font=("Georgia", 15), bg="#8B0000")


button_login = tk.Button(frame, text='Login', font=("Georgia", 15), bd=0, highlightthickness=0, bg="#8B0000", fg="white")


button_singUp = tk.Button(frame, text='Cadastro', font=("Georgia", 15), bd=0, highlightthickness=0, bg="#8B0000", fg="white")


#####     POSICAO DOS COMPONENTES(LAYUOT)     #####
img1.grid(row=1, column=0)
label_welcome.grid(row=0, column=0, padx=15, pady=10, sticky='nswe')
button_login.grid(row=0, column=1, padx=(400, 0), pady=10, sticky='nswe')
button_singUp.grid(row=0, column=2, padx=10, pady=10, sticky='nswe')

frame.mainloop()