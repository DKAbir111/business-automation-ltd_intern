class Car:
    def __init__(self, name, model, year):
        self.name = name
        self.model = model
        self.year = year

    def display_info(self):
        print(f"{self.year} {self.name} {self.model}")


class ElectricCar(Car):
    def __init__(self, name, model, year, battery_capacity):
        super().__init__(name, model, year)
        self.battery_capacity = battery_capacity

    def display_info(self):
        super().display_info()
        print(f"Battery Capacity: {self.battery_capacity} kWh")


class GasCar(Car):
    def __init__(self, name, model, year, fuel_efficiency):
        super().__init__(name, model, year)
        self.fuel_efficiency = fuel_efficiency

    def display_info(self):
        super().display_info()
        print(f"Fuel Efficiency: {self.fuel_efficiency} MPG")


def get_car_information():
    car_type = input("Enter car type (Electric/Gas): ").capitalize()
    name = input("Enter Name: ")
    model = input("Enter model: ")
    year = int(input("Enter year: "))

    if car_type == "Electric":
        battery_capacity = float(input("Enter battery capacity (kWh): "))
        return ElectricCar(name, model, year, battery_capacity)
    elif car_type == "Gas":
        fuel_efficiency = float(input("Enter fuel efficiency (MPG): "))
        return GasCar(name, model, year, fuel_efficiency)
    else:
        print("Invalid car type. Please enter Electric or Gas.")
        return get_car_information()


# Get ElectricCar information
electric_car = get_car_information()
print("\nCar Information:")
electric_car.display_info()

# Get GasCar information
gas_car = get_car_information()
print("\nCar Information:")
gas_car.display_info()
