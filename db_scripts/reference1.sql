ALTER TABLE rooms
        ADD CONSTRAINT fk_rooms_hotels
        FOREIGN KEY (hotelId)
        REFERENCES hotels (Id)