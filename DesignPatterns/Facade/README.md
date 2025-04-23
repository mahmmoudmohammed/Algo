# Facade Pattern

The Facade Pattern provides a unified interface to a set of interfaces in a subsystem.
It defines a higher-level interface that makes the subsystem easier to use.

---

## Problem

When a system is complex and involves multiple subsystems, interacting with them can be overwhelming.
You may want to simplify the interface for external clients without exposing internal logic.

---

## 💡 Solution

Introduce a facade class that wraps subsystem interactions and offers a simplified API to clients.

---

## Real-World Example

Think of a hotel concierge. Instead of guests directly interacting with housekeeping, maintenance, and room service separately, the concierge (facade) handles everything through a single point of contact.

---