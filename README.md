# API de Email
## Sobre

Api de envio de e-mail usando Mailgun e Laravel!

## ENDPOINT

http://localhost/mail/apikey={api_ley}/{nome}+{email}+{assunto}+{corpo_email}+{agendar?}

- {api_key} = chave da api disponibilisada pelo desenvolvedor.
- {name} = Nome do destinatario do e-mail.
- {email} = Email do destinatario do e-mail.
- {assunto} = Titulo do e-mail que deseja enviar.
- {corpo_email} = Conteúdo do e-mail que deseja enviar.
- {agendar?} = Data desejada para o envio do e-mail. Formato aceito string Y-m-d H:i:s ("2022-10-10 16:00:00")  (Caso na haja envio o e-mail será incaminhado instantaneamente!)