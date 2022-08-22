<!DOCTYPE html>
<html>
<head>
    <title>AscotTask.com</title>
</head>
<body>
    <h1>{{ $request->name .'is added' }}</h1>
    <p>{{'its Stock ID is:'. $request->id }}</p>
    <p>{{'its price is:'. $request->price }}</p>
    <p>{{'its cost is:'. $request->cost }}</p>
    <p>{{'its shipping is:'. $request->shipping }}</p>
    <p>{{'its tax is:'. $request->tax }}</p>

    <p>Thank you</p>
</body>
</html>
