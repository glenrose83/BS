from twilio.rest import Client

client = Client("AC806b40d5a1074f6170d14a60d7991992","0d0410504731137b44b56ad2cf154054")

#for msg in client.messages.list():
#    print(msg.body)

msg = client.messages.create(
    to="+4528141529",
    from_="+12543292339",
    body="helo mister Glen",
)

print(f"Created a new messesage: {msg.sid}")